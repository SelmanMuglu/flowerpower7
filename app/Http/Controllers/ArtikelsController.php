<?php

namespace App\Http\Controllers;

use App\Artikel;
use Gate;
use Illuminate\Http\Request;

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

    public function edit(Artikel $artikels)
    {
        return view('artikel.edit', ['artikels' => $artikels]);

    }

    public function update($id)
    {
       $artikel = Artikel::find($id);
       $artikel->artikel = request('artikel');
       $artikel->prijs = request('prijs');
       $artikel->save();

       return redirect('/artikel');
    }
}
