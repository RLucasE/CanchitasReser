<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    use HasFactory;

    protected $table = 'referees';

    protected $primaryKey = 'referee_id';

    protected $fillable = [
        'user_id',
    ];
    
    public function clashes(){
        return $this->hasMany(Clash::class, 'referee_id');
    }
    
}
