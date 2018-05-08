<?php

namespace App;

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
    'name', 'email', 'password','head_image','bg_image','sex','birthday','xingzuo','motto','like','addresss','job'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //收藏的文章
    public function posts(){
        return $this->belongsToMany('App\Models\Post','posts_users','user_id','post_id');
    }

    public function friends(){
        return $this->belongsToMany('App\User','friends_users','user_id','friend_id');
    }
}
