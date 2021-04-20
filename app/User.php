<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use App\Traits\HasRolesAndPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements BannableContract
{
    use Notifiable, HasRoles, Bannable; /// HasRolesAndPermissions,

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'surname', 'middle_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

}
