<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotion';
    public $timestamps = true;

    protected $primaryKey = 'idPromotion';

    protected $fillable = [
        'promotionType',
        'promotionCode',
        'percentPromo',
        'moneyPromo',
        'moneyLimit',
        'expireDay',
        'status'
    ];
}
