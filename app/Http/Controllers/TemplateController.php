<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index(){
        return view('fronted.home');
    }

    public function dashboard(){
        return view('auth.dashboard');
    }
}
