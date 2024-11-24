<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $primaryKey = 'position_id';

    //averiguar si los nombres de las columnas están bien(?)
    protected $fillable = [
        'team_id',
        'clash_played',
        'wins',
        'draws',
        'losed',
        'points',
        'goals_for',
        'goals_against',
        'goal_difference',
    ];

    public function team(){
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function championship(){
        return $this->belongsTo(Championship::class, 'championship_id');
    }
}
