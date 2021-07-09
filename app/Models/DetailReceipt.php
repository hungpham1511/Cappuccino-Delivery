<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailReceipt extends Model
{
    use HasFactory;
    protected $table = 'detail_receipt';
    public $timestamps = true;
    protected $primaryKey = 'idDetailReceipt';
    protected $fillable = [
        'idDrink',
        'idReceipt',
        'amount',
        'size',
        'price',
        'created_at',
        'updated_at'
    ];
    public function receipt()
    {
        return $this->belongsTo('App\Receipt','idReceipt');
    }
}
