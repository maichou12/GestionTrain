<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gare extends Model
{
    use HasFactory;
    public function trajetD(){
        return $this->hasMany(Trajet::class, 'gareDep_id');
    }
    public function trajetA(){
        return $this->hasMany(Trajet::class, 'gareArrive_id');
    }
}
