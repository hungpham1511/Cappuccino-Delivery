<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailWeeklyBook extends Model
{
    use HasFactory;
    protected $table = 'detail_weekly_book';
    public $timestamps = true;
    protected $primaryKey = 'idDetailWeeklyBook';
    public function receipt()
    {
        return $this->belongsTo('App\Receipt','foreign_key');
    }
}
