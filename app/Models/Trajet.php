<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;
    public function gareDepart()
    {
        return $this->belongsTo(Gare::class, 'gareDep_id');
    }
    public function gareArrive()
    {
        return $this->belongsTo(Gare::class, 'gareArrive_id');
    }

    public function billets(){
        return $this->hasMany(Billet::class, 'trajet_id');
    }

}
