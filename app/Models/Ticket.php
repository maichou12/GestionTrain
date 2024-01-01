<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        // Autres attributs fillable...
        'billet_id',
        'user_id', // Assurez-vous que 'user_id' est dans la liste fillable
        'statut',
        'codeQr',
    ];

    public function billet()
    {
        return $this->belongsTo(Billet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    protected static function booted()
    {
        static::saving(function ($ticket) {
            $ticket->updateStatut();
        });
    }

    public function updateStatut()
    {
        // Vérifiez si la valeur de statut est différente de 0
        // et si la date de création + 7 jours est inférieure à la date actuelle
        if ($this->statut != 0 && now()->diffInDays($this->created_at) >= 7) {
            // Mettez à jour le statut à 0
            $this->statut = 0;
        }
    }
}
