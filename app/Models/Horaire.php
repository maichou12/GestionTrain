<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;
    public function trajet(){
        return $this->hasMany(Trajet::class, 'horaire_id');
    }
}
