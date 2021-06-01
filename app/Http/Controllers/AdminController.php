<?php

namespace App\Http\Controllers;

use App\Events\AddLogs;

use App\Events\WasBanned;
use App\Events\WasUnbanned;
use App\Models\Logs;
use App\Models\Permission;
//use App\Models\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Запись логов
    public static function log_record($message)
    {
        $ip = request()->ip();
        event(new WasUnbanned(Auth::user()->name,  $message, $ip));  //пишем в журнал
    }

    // Вывод логов
    public function log_view()
    {
       // AdminController::log_record('Открыл журнал ИБ для просмотра  ');//пишем в журнал
       // return view('admin.admin', ['logs' => Logs::orderBy('id', 'desc')->paginate(15)]);
        return view('web.admin.admin_main', ['logs' => Logs::orderBy('id', 'desc')->paginate(20)]);
    }

    // Вывод Пользователей
    public function user_view()
    {
        return view('admin.user_view', ['users' => User::all()]);
    }

// Вывод ролей
    public function role_view()
    {

        return view('admin.role_view', ['roles' => Role::all()]);
    }

    // Вывод привелегий
    public function perm_view()
    {
        return view('admin.perm_view', ['perms' => Permission::all()]);
    }

    // Выгрузка логов
    public function pdf_logs()
    {

        $data['title'] = 'Журнал событий';
        $data['logs'] = Logs::orderBy('id', 'desc')->get();
        $patch = 'logs' . Carbon::now() . '.pdf';
        $ip = request()->ip();
        event(new AddLogs(Auth::user()->name, $patch, $ip));  //пишем в журнал
        // Event::fire(new AddLogs(Auth::user()->name));
        $pdf = PDF::loadView('admin.logs_pdf', $data);

        return $pdf->download($patch);
    }

    // Добавить нового пользователя
    public function reg_user()
    {

        return view('admin.new_user', ['roles' => Role::all()]);
    }

    // Сохранить нового пользователя
    public function add_user(Request $request)
    {


        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'middle_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
//        $user = new User(
//            ['name' => $request->input('name'),
//                'surname' => $request->input('surname'),
//                'middle_name' => $request->input('middle_name'),
//                'email' => $request->input('email'),
//                'password' => Hash::make($request->input('password')),
//
//            ]);

         //   $role = Role::find($request->input('role'));
       //     $role->users()->save($user);
            $user->assignRole($request->input('role'));


        $this->log_record('Добавил пользователя '.$user->name. 'с ролью '.$request->input('role'));//пишем в журнал

        return redirect('/admin/users');
    }

    // Удалить пользователя
    public function destroy_user($id)
    {
        $user = User::find($id);
        $this->log_record('Удалил пользователя '.$user->name);//пишем в журнал
        DB::delete('delete from users where id = ?', [$id]);

        return redirect('/admin/users');
    }

    // Редактировать пользователя
    public function edit_user($id)
    {
        $user = User::find($id);
        return view('admin.edit_user', ['users' => $user, 'roles' => Role::all()]);
    }

    // Сохранить редактирование пользователя
    public function update_user(Request $request)
    {

        // $user = User::find($request->input('id'));
        $id = $request->input('id');
//        $user=User::whereId($request->input('id'))->update([
//            'name' => $request->input('name'),
//            'surname' => $request->input('surname'),
//            'middle_name' => $request->input('role'),
//            'email' => $request->input('email'),
//            'password' => Hash::make($request->input('password')),
//        ]);
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'middle_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('role'));
        $this->log_record('Изменил данные пользователя '.$request->input('name'));//пишем в журнал
        return redirect('/admin/users');
    }

    //Блокировка пользователя
    public function ban1_user($id)
    {
        $user = User::find($id);
        $user->ban();
        $this->log_record('Заблокировал пользователя '.$user->name);//пишем в журнал
        return redirect('/users');
    }

    //Разблокировка пользователя

    public function unban_user($id)
    {
        $user = User::find($id);
        $user->unban();
        $this->log_record('Разблокировал пользователя '.$user->name);//пишем в журнал
        return redirect('/users');
    }

    // Добавить новую роль пользователя
    public function reg_role()
    {

        return view('admin.new_role', ['update' => 0, 'perms' => Permission::all()]);
    }

    // Сохранить новую роль пользователя
    public function add_role(Request $request)
    {
      $role = new Role(
            ['name' => $request->input('name'),
                'slug' => $request->input('slug'),
             ]);
     $role->save();
        $this->log_record('Добавил роль '.$role->name);//пишем в журнал
      return redirect('/admin/roles');
    }
    // Удалить пользователя
    public function destroy_role($id)
    {
        $role = Role::find($id);
        $this->log_record('Удалил роль '.$role->name);//пишем в журнал
        DB::delete('delete from roles where id = ?', [$id]);

        return redirect('/admin/roles');
    }

    // Редактировать пользователя
    public function edit_role($id)
    {
        $role = Role::find($id);
        return view('admin.new_role', ['roles' => $role, 'update' => 1]);
    }

    // Сохранить редактирование пользователя
    public function update_role(Request $request)
    {

        // $user = User::find($request->input('id'));

        Role::whereId($request->input('id'))->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),

        ]);

        $this->log_record('Изменил роль '. $request->input('name'));//пишем в журнал
        return redirect('/admin/roles');
    }

    public function xml_view ()
    {

        $contents = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?> \n <Document xmlns=\"urn:iso:std:iso:20022:tech:xsd:pain.008.001.02\">";


       Storage::disk('remote-sftp')->put('15_min.xml', $contents, 'public');

    }

}
