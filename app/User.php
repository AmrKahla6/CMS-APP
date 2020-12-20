<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Profile;
use App\Post;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name', 'email', 'password',
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

    public function isAdmin()
    {
        return $this->role =='admin';
    }// End Of This Admin

    public function isWriter()
    {
        return $this->role =='writer';
    }// End Of This writer


    public function hasPicture()
    {
        if(preg_match('/profilePicture/',$this->profile->picture , $match))
        {
            return true;
        }
        else
        {
            return false;
        }
    }// End OF Has Picture

    public function getGravatar()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://gravatar.com/avatar/$hash";
    }// End Of Gravatar

    public function getPicture()
    {
        return $this->profile->picture;
    }// End Of Picture

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }// End Of Relationship

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
