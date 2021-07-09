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
        'idUser',
        'receiptDate',
        'payment',
        'note',
        'status',
        'total',
        'isWeeklyBook',
        'idDetailWeeklyBook',

        'created_at'
    ];
    public function weeklyBook()
    {
        return $this->hasOne('App\Models\DetailWeeklyBook','idReceipt');
    }
    public function detail_receipt()
    {
        return $this->hasMany('App\Models\DetailReceipt','idReceipt');
    }
}
