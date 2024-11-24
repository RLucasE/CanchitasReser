<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    use HasFactory;

    protected $table = 'leaders';

    protected $primaryKey = 'leader_id';

    protected $fillable = [
        'status',
        'amount_owed',
    ];

    public function payments(){
        return $this->hasMany(Payment::class, 'leader_id');
    }

    public function team(){
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
