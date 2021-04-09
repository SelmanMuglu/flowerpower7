<?php

namespace App\Http\Controllers;

use App\Bestelling;
use App\Artikel;
use App\Winkel;
use Illuminate\Http\Request;

class BestellingsController extends Controller
{
   public function index(){

       $bestellingen = Bestelling::all();

       return view('bestelling', compact('bestellingen'));

   }

}
