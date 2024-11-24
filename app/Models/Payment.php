<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'user_id',
        'inscription_id',
        'payment_date',
    ];

    protected $casts = [
        'payment_date' => 'datetime: d-m-Y',
        //'reservation_time' => 'datetime: H:i', //FALTÓ PONER LA HORA EN PAYMENTS PARA SABER LA HORA EN LA QUE SE HIZO EL PAGO
    ];

    public function inscription(){
        return $this->belongsTo(Inscription::class, 'inscription_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function leader(){
        return $this->belongsTo(Leader::class, 'leader_id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class, 'reservation_id');
    }

}
