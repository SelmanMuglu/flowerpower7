<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Winkel;
use Illuminate\Http\Request;

class BestellingsController extends Controller
{
    public function create(){

        $artikel = Artikel::all();
//        dd($artikel);
        $winkels = Winkel::all('plaats', 'winkel_id');

        return view('bestellen.create',['artikel' => $artikel], ['winkels' => $winkels]);
    }

    public function bestellen(Artikel $artikel){
        $winkels = Winkel::all('plaats', 'winkel_id');

        return view('artikel.bestellen' ,compact('winkels', 'artikel'));
    }

}
