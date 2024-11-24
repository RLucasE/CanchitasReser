<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clash extends Model
{
    use HasFactory;

    protected $table = 'clashes';

    protected $primaryKey = 'clash_id';

    protected $fillable = [
        'referee_id',
        'championship_id',
        'field_id',
        'team_id_home',
        'team_id_away',
        'clash_date',
        'clash_time',
        'goals_home',
        'goals_away',
        'status',
    ];

    /*protected $casts = [
        'clash_date' => 'datetime: d-m-Y',
        'clash_time' => 'datetime: H:i',
    ];*/

    public function homeTeam(){
        return $this->belongsTo(Team::class, 'team_id_home');
    }

    public function awayTeam(){
        return $this->belongsTo(Team::class, 'team_id_away');
    }

    //VA relacion 1 a 1, belongs to VA en reservations
    public function reservation(){
        return $this->hasOne(Reservation::class, 'clash_id');
    }

    public function referee(){
        return $this->belongsTo(Referee::class, 'referee_id');
    }

    public function scorers(){
        return $this->hasMany(Scorer::class, 'clash_id');
    }

    public function payment_per_matches(){
        return $this->hasMany(PaymentPerMatch::class, 'clash_id');
    }
}
