<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'token',
    ];

    protected $hidden = [
        'password', 'token',
    ];

    public function isAdmin()
    {
        if($this->role == 2) return true;

        return false;
    }
}
