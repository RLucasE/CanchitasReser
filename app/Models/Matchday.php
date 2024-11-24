<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchday extends Model
{
    use HasFactory;

    protected $table = 'matchdays';

    protected $primaryKey = 'matchday_id';

    protected $fillable = [
        'start_date',
        'end_date',
        'matchday_number',
    ];

    protected $casts = [
        'start_date' => 'datetime: d-m-Y',
        'end_date' => 'datetime: d-m-Y',
    ];

    public function championship(){
        return $this->belongsTo(Championship::class, 'championship_id');
    }
    
    public function reservations(){
        return $this->hasMany(Reservation::class, 'matchday_id');
    }
    
    public function scorers(){
        return $this->hasMany(Scorer::class, 'matchday_id');
    }

}
