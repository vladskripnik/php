<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_id');
    }
    public function getUsers($id_user)
    {   
        $data['excerpt'] = $id_user;
        if(!empty($data['excerpt']))
        {
            $users = User::where('id', '!=', $data['excerpt'])->get();
            return ($users);
        }
        else
        {
            $users = User::all();
            return ($users);
        }
    }
    public function hasAnyGroup($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
}
