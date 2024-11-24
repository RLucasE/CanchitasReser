<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $primaryKey = 'team_id';

    protected $fillable = [
        'team_id',
        'name',
        'logo',
    ];

    public function leaders(){
        return $this->hasMany(Leader::class, 'team_id');
    }

    public function players(){
        return $this->hasMany(Player::class, 'team_id');
    }

    //ralacion entre el equipo y los partidos (VER QUE PASA ACÁ porque un partido tiene a dos equipos)
    
    public function clashes(){
        return $this->hasMany(Clash::class, 'team_id');
    }
    
    public function position(){
        return $this->belongsTo(Position::class, 'position_id');
    }
}
