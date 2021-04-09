<?php

namespace App\Http\Controllers;

use App\Artikel;


use Gate;
use App\Bestelling;
use App\User;
use App\Winkel;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelsController extends Controller
{
    public function index()
    {
        $artikels = Artikel::all();


        return view('artikel.index', ['artikels' => $artikels]);
    }

    public function show($id){

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


        return view('artikel.bestellen' ,compact('artikel', 'winkels'));
    }

    public function storeBestelling(Request $request)
    {

        $bestelling = new Bestelling();

        $bestelling->user_id = Auth::id();
        $user = Auth::user();
        $bestelling->user_id = $user->id;
        $bestelling->artikel_id = $request->artikel_id;
        $bestelling->winkel_id = $request->winkel;
        $bestelling->aantal = $request->aantal;
        $bestelling->prijs = $request->prijs;
        $bestelling->totaal = $request->aantal*$request->prijs;
        $bestelling->save();
//        if(isset($_SESSION['Cart'])&&isset($_SESSION['Cart'][$request->artikel_id])){
//            $_SESSION['Cart'][$request->artikel_id]++;
//
//        }
//        else{
//            $_SESSION['Cart'][$request->artikel_id]= 1;
//        }
//
//        dd($_SESSION['Cart']);

        return redirect('artikel');
    }
}
