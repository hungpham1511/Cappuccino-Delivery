<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    use HasFactory;
    protected $table = 'topping';
    public $timestamps = true;

    protected $primaryKey = 'idTopping';

    protected $fillable = [
        'name',
        'price',
        'created_at'
    ];
}
