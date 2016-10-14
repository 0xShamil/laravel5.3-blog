<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'first_name', 'last_name', 'avatar', 'bio', 'password', 'facebook', 'twitter', 'linkedin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'user_role', 'user_id', 'role_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function getName()
    {
        if($this->first_name && $this->last_name) {
            return "{$this->first_name} {$this->last_name}";
        }

        if($this->first_name) {
            return $this->first_name;
        }

        return null;
    }

    public function getNameorUsername()
    {
        return $this->getName() ?: $this->username;
    }

    public function getFirstNameorUsername()
    {
        return $this->first_name ?: $this->username;
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles)) {
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            if($this->hasRole($role)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function hasAvatar()
    {
        if($this->avatar) {
            return true;
        }

        return false;
    }

    /**
     * @param string $token
     *
     * @return \App\Services\Auth\User|null
     */
    public static function findByToken(string $token)
    {
        $resetRecord = app('db')->table('password_resets')->where('token', $token)->first();

        if (empty($resetRecord)) {
            return;
        }

        return static::where('email', $resetRecord->email)->first();
    }
}
