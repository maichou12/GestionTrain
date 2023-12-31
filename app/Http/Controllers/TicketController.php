<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

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
}
