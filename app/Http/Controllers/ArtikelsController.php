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
}
