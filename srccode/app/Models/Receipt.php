<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $table = 'receipt';
    public $timestamps = true;

    protected $primaryKey = 'idReceipt';

    protected $fillable = [
        'receiptDate',
        'payment',
        'note',
        'status',
        'total',
        'created_at'
    ];
}
