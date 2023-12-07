<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
        'password' => 'hashed',
    ];

    public function tests(){
        return $this->hasMany(UserTests::class);
    }

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function competetions(){
    return $this->hasMany(UserCompetetion::class,);
    }
    public function literatures(){
        return $this->hasMany(UserLiterature::class);
    }
    public function competetionArchive(){
        return $this->hasMany(UserCompetetionArchive::class);
    }
    public function notifications()
    {
        return $this->hasMany(UserNotification::class);
    }
    public function objects() {
        return $this->belongsToMany(Objects::class, 'user_objects', 'user_id', 'object_id');
    }
    public function subdivisions() {
        return $this->belongsToMany(Subdivision::class,'subdivision_users',"user_id");
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
