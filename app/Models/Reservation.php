<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $primaryKey = 'reservation_id';

    protected $fillable = [
        'field_id',
        'payment_id',
        'reservation_date',
        'reservation_time'
    ];

    protected $casts = [
        'reservation_date' => 'datetime: d-m-Y',
        'reservation_time' => 'datetime: H:i:s'
    ];

    public function field(){
        return $this->belongsTo(Field::class, 'field_id');
    }

    public function payment(){
        return $this->belongsTo(Payment::class, 'payment_id');
    }

    public function matchday(){
        return $this->belongsTo(Matchday::class, 'matchday_id');
    }

    public function clash(){
        return $this->belongsTo(Clash::class, 'clash_id');
    }
}
