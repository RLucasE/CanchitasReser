<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    use HasFactory;

    protected $table = 'championships';

    protected $primaryKey = 'championship_id';

    protected $fillable = [
        'name',
        'logo',
        'start_date',
        'end_date',
        'gender',
        'max_number_participants',
        'field_type',
    ];
 
    protected $casts = [
        'start_date' => 'datetime: d-m-Y',
        'end_date' => 'datetime: d-m-Y',
        //'reservation_time' => 'datetime: H:i'
    ];

    public function incriptions(){
        return $this->hasMany(Inscription::class, 'championship_id');
    }


    public function matchdays(){
        return $this->hasMany(Matchday::class, 'championship_id');
    }

    public function positions(){
        return $this->hasMany(Position::class, 'championship_id');
    }

    public function scorers(){
        return $this->hasMany(Scorer::class, 'championship_id');
    }
}
