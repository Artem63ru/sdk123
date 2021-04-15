<?php

namespace App\Http\Controllers;

use App\Events\AddLogs;

use App\Events\WasBanned;
use App\Events\WasUnbanned;
use App\Models\Logs;
use App\Models\Permission;
use App\Models\Role;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;
use Carbon\Carbon;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Запись логов
    public function log_record($message)
    {
        $ip = request()->ip();
        event(new WasUnbanned(Auth::user()->name,  $message, $ip));  //пишем в журнал
    }

    // Вывод логов
    public function log_view()
    {

        return view('admin.admin', ['logs' => Logs::orderBy('id', 'desc')->paginate(15)]);
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

        return view('admin.new_user', ['perms' => Permission::all()]);
    }

    // Добавить нового пользователя
    public function add_user(Request $request)
    {

        $user = new User(
            ['name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'middle_name' => $request->input('middle_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),

            ]);
        if ($request->has('checkbox')) {
            $role = Role::find(1);
            $role->users()->save($user);
        }
        if ($request->has('checkbox1')) {
            $role = Role::find(2);
            $role->users()->save($user);
        }

        $this->log_record('Добавил пользователя '.$user->name);//пишем в журнал

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
        return view('admin.edit_user', ['users' => $user]);
    }

    // Сохранить редактирование пользователя
    public function update_user(Request $request)
    {

        // $user = User::find($request->input('id'));

        User::whereId($request->input('id'))->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'middle_name' => $request->input('middle_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
//        if ($request->has('checkbox')) {
//            $role = Role::find(1);
//            $role->users()->save($user);
//        }
//        if ($request->has('checkbox1')) {
//            $role = Role::find(2);
//            $role->users()->save($user);
//        }
        $user = User::find($request->input('id'));
        $this->log_record('Изменил данные пользователя '.$user->name);//пишем в журнал
        return redirect('/admin/users');
    }

    //Блокировка пользователя
    public function ban1_user($id)
    {
        $user = User::find($id);
        $user->ban();
        $this->log_record('Заблокировал пользователя '.$user->name);//пишем в журнал
        return redirect('/admin/users');
    }

    //Разблокировка пользователя

    public function unban_user($id)
    {
        $user = User::find($id);
        $user->unban();
        $ip = request()->ip();
        $this->log_record('Разблокировал пользователя '.$user->name);//пишем в журнал
        return redirect('/admin/users');
    }
}
