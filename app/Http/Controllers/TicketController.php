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
}
