<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    use HasFactory;

    public function trajet()
    {
        return $this->belongsTo(Trajet::class, 'trajet_id');
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'billet_id');
    }
}
