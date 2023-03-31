<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{

    use HasFactory;

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'username',
        'name',
        'avatar',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //
    //
    //

    public function setPasswordAttribute($value){

        $this->attributes['password'] = bcrypt($value);

    }

    public function getAvatarAttribute($value){

        return asset($value);

    }

    public function posts(){

        return $this->hasMany(Post::class);

    }

    public function permissions(){

        return $this->belongsToMany(Permission::class);

    }

    //
    //
    //

    //
    //
    //

    //
    //
    //

    public function userHasRole2($role){

        if((auth()->user()->role) == 'Admin'){

        $role = DB::table('users')->select('role')->get();

        return true;

        }

        return false;

    }

}
