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
    public function receipt()
    {
        return $this->belongsTo('App\Receipt','foreign_key');
    }
}
