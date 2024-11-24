<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $table = 'fields';

    protected $primaryKey = 'field_id'; 

    protected $fillable = [
        'capacity',
        'price',
        'logo',
    ];
    
    public function reservations(){
        return $this->hasMany(Reservation::class, 'field_id');
    }
    
}
