<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $table = 'inscriptions';

    protected $primaryKey = "inscription_id";

    protected $fillable = [
        'championship_id',
        'inscription_date',
        'price',
    ];

    protected $casts = [
        'inscription_date' => 'datetime: d-m-Y',
        //'reservation_time' => 'datetime: H:i'
    ];

    public function championship(){
        return $this->belongsTo(Championship::class, 'championship_id');
    }

    public function payment(){
        return $this->hasMany(Payment::class, 'payment_id');
    }

}
