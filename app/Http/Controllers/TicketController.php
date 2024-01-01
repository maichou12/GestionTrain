<?php

namespace App\Http\Controllers;

use App\Models\Billet;
use App\Models\Ticket;
use App\Models\Horaire;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use BaconQrCode\Common\ErrorCorrectionLevel;

class TicketController extends Controller
{
    public function index(){
        // Recup de l'utilisateur connecté
        $user = Auth::user();
        // Récupérer les réservations uniquement pour l'utilisateur connecté
        $listeTickets = $user->tickets;
           return view('Layouts.tickets', compact('listeTickets'));
       }

    public function mesTickets(){
        $user = auth()->user();
        $listeTickets = $user->tickets;

        // Passez la liste des tickets à la vue
        return view('Layouts.tickets', compact('listeTickets'));
    }

    // fonction de reservation (ajout de ticket)
    public function reservation(Request $request){
        // Récupérer la liste des billets
        $billets = Billet::with('trajet')->get();
        $horaires = Horaire::all();

        return view('crudTickets.reservation', compact('billets', 'horaires'));
    }

    // mise a jour dans la bd
    public function reservationStore(Request $request){
        $request -> validate(
            [
                'billet_id'=> 'required|exists:billets,id',
                'heure_depart_perso' => 'required|exists:horaires,id',
            ]
        );


        $ticket = new Ticket([
            'billet_id' => $request->input('billet_id'),
            'user_id' => auth()->id(), // Utilisateur connecté
            'statut' => 1, // Valeur par défaut
            'heure_depart_perso' => $request->input('heure_depart_perso'),
        ]);
        $ticket->save();
        $this->generateQrCodes($ticket);
        return redirect()->route('ticket-p')->with('success', 'Ticket reserved successfully!');


    }
    public function generateQrCodes(Ticket $ticket)
    {
        // Générer le code QR
        $qrCode = QrCode::size(150)
        ->color(220, 220, 220)
        ->generate($ticket->id);
        $qrPath = 'qrcodes/' . $ticket->id . '.png';

        // Sauvegarder le fichier du code QR dans le répertoire qrcodes
        File::put(public_path($qrPath), $qrCode);

        // Mettre à jour le champ 'codeQr' du ticket avec le chemin du code QR
        $ticket->codeQr = $qrPath;

        // Sauvegarder le ticket mis à jour dans la base de données
        $ticket->save();
    }



    // affiche details ticket
    public function show($id){
        $ticket = Ticket::find($id);
        return view('crudTickets.show', compact('ticket'));
    }


}
