<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $primaryKey = 'player_id';

    protected $fillable = [
        'name',
        'dni',
        'gender',
        'phone',
        'birthdate',
        'age',
        'photo',
    ];

    public function payment_per_matches(){
        return $this->hasMany(PaymentPerMatch::class, 'player_id');
    }

    public function scorers(){
        return $this->hasMany(Scorer::class, 'player_id');
    }

    public function team(){
        return $this->belongsTo(Team::class, 'team_id');
    }
}
