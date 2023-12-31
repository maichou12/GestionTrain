<?php

namespace App\Http\Controllers;

use App\Models\Billet;
use Illuminate\Http\Request;

class BilletController extends Controller
{
    public function index(){
        $listeBillets = Billet::all();
           return view('Layouts.billet', compact('listeBillets'));
       }
}
