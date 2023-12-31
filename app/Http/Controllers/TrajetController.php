<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    public function index(){
     $listeTrajets = Trajet::all();
        return view('Layouts.trajet', compact('listeTrajets'));
    }
}
