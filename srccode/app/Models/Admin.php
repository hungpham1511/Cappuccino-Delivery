<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';
    protected $guarded = array();
    public $timestamps = true;

    protected $primaryKey = 'idAdmin';

    protected $fillable = [
        'username',
        'email',
        'created_at'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}

