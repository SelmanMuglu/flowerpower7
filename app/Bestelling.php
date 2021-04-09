<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model
{
    protected $fillable = [
        'artikel_id',
        'winkel_id',
        'user_id',
        'aantal',
        'prijs',
        'totaal',
        'afgehaald'
    ];

    public function winkel(){
        return $this->belongsTo('App\Winkel', 'winkel_id');
    }

    public function artikel(){
        return $this->belongsTo('App\artikel', 'artikel_id');
    }
}
