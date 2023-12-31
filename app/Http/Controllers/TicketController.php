<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function index(){
        $listeTickets = Ticket::all();
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
        return view('Layouts.reservation');
    }


    public function qrCode(){
        $qrCode = QrCode::format('jpeg')
        ->merge('image/TER Dakar-AIBD.jpeg', 0.5, true)
        ->size(200)
        ->background(255, 255, 0)
        ->color(0, 0, 255)
        ->margin(1)
        ->generate('Ticket');

        return view('Layouts.qrcode', compact('qrCode'));
    }
}
