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
    public function expenses() {
        return $this->hasMany(expenses::class);
    }
    public function income() {
        return $this->hasMany(income::class);
    }
    public function posts() {

        return $this->hasMany(Post::class);

    }
    public function daylogs(){

        return $this->hasMany(Daylog::class)->latest();
    }
    public function characters(){

        return $this->hasMany(Character::class);
    }

    public function addDaylog($body){
        Daylog::create([
            'body' => request('body'),
            'user_id'=> auth()->id()
        ]);
    }
}
