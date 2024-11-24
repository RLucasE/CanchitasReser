<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scorer extends Model
{
    use HasFactory;

    protected $table = 'scorers';

    protected $primaryKey = 'scorer_id';

    protected $fillable = [
        'goals_quantity',
    ];

    public function championship(){
        return $this->belongsTo(Championship::class, 'championship_id');
    }

    public function matchday(){
        return $this->belongsTo(Matchday::class, 'matchday_id');
    }

    public function clash(){
        return $this->belongsTo(Clash::class, 'clash_id');
    }

    public function player(){
        return $this->belongsTo(Player::class, 'player_id');
    }
}
