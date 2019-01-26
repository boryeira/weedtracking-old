<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPassword;
use Balping\HashSlug\HasHashSlug;

class User extends Authenticatable
{
    use Notifiable;
    use HasHashSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function allplants()
    {
        return $this->hasMany('App\Plant')->withTrashed()->orderBy('created_at','desc');
    }

    public function plants()
    {
        return $this->hasMany('App\Plant');
    }
    
    public function harvested()
    {
        return $this->hasMany('App\Plant')->onlyTrashed();
    }

    public function feeds()
    {
        return $this->hasMany('App\Feed');
    }



    public function posts()
    {
        return $this->hasMany('App\Post')->where('type','!=','day');
    }

    public function friends()
    {
        return $this->orderBy('name','asc')->get();
    }

    public function images()
    {
        return $this->hasMany('App\Post')->where('type','image');
    }

    public function comments()
    {
        return $this->hasMany('App\Post')->where('type','comment');
    }

    public function texts()
    {
        return $this->hasMany('App\Post')->where('type','text');
    }

    public function videos()
    {
        return $this->hasMany('App\Post')->where('type','video');
    }

////Invitasciones
    public function invitations()
    {
        return $this->hasMany('App\Invitation');
    }

    public function invitationsNotUsed()
    {
        return $this->hasMany('App\Invitation')->where('email',null)->where('new_user_id',null);
    }

    public function invitationsUsed()
    {
        return $this->hasMany('App\Invitation')->where('email','!=',null);
    }

    public function sendPasswordResetNotification($token)
    {
        return $this->notify(new ResetPassword($token));
    }

}
