<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPerMatch extends Model
{
    use HasFactory;

    protected $table = 'payment_per_matches';

    protected $primaryKey = 'payment_per_matches_id';

    protected $fillable = [
        'payment_date',
    ];

    protected $casts = [
        'payment_date' => 'datetime: d-m-Y',
    ];

    public function player(){
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function clash(){
        return $this->belongsTo(Clash::class, 'clash_id');
    }
}
