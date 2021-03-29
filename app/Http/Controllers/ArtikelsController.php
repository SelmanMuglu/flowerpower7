<?php

namespace App\Http\Controllers;

use App\Artikel;

use Gate;
use App\Bestelling;
use App\User;
use App\Winkel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelsController extends Controller
{
    public function index()
    {
        $artikels = Artikel::all();


        return view('artikel.index', ['artikels' => $artikels]);
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(Artikel $artikel)
    {
        request()->validate([
            'artikel' => 'required',
            'prijs' => 'required'
        ]);

        $artikel->artikel = request('artikel');
        $artikel->prijs = request('prijs');
        $artikel->save();

        return redirect('/artikel');
    }

    public function edit(Artikel $artikel)
    {

        return view('artikel.edit', ['artikel' => $artikel]);

    }

    public function update($id)
    {
       $artikel = Artikel::find($id);
       $artikel->artikel = request('artikel');
       $artikel->prijs = request('prijs');
       $artikel->save();

       return redirect('artikel');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect('artikel');
    }

    public function indexBestellen()
    {
        return view('artikel.bestellingen');
    }

    public function bestellen(Artikel $artikel){
        $winkels = Winkel::all('plaats', 'winkel_id');

        return view('artikel.bestellen' ,compact('winkels', 'artikel'));
    }

    public function storeBestelling(Request $request)
    {

        $bestelling = new Bestelling();
        $user = Auth::user();
        $bestelling->artikel_id = $request->artikel_id;
        $bestelling->user_id = $user->id;
        $bestelling->winkel_id = $request->winkel_id;
        $bestelling->aantal = $request->aantal;
        dd($bestelling);
        $bestelling->save();

        return redirect('artikel');
    }
}
