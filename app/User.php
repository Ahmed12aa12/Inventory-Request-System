<?php

namespace App;

use App\Notifications\UserRegistered;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Notification;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Cache;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable, HasRoles, LogsActivity, CausesActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password',
        'Name_En','Name_Ku','Name_Ar','Phone','Dep_id'
    ];

    protected static $logAttributes = ['Name_En', 'email','password'];
    protected static $logOnlyDirty = true;
    protected static $logName = 'User';

    protected static $logAttributesToIgnore = ['remember_token'];
    protected static $ignoreChangedAttributes = ['remember_token'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function department()
    {
        return $this->belongsTo('App\Department','Dep_id');
    }
 

public function category()
{
    return $this->hasMany('App\Category');
}
public function isOnline()
{
    
    return Cache::has('user-is-online-'.$this->id);
}

}
