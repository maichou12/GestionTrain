<?php

namespace App\Http\Controllers;

use App\Models\Horaire;
use Illuminate\Http\Request;

class HoraireController extends Controller
{
    public function index(){
        $listeHoraires = Horaire::all();
           return view('Layouts.horaires', compact('listeHoraires'));
       }
}
