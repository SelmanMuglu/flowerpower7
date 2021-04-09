<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Artikel extends Model
{
    protected $primaryKey = 'artikel_id';

    public function winkel(){
        return $this->belongsToMany('App\Winkel');
    }

    public function bestellingen(){
        return $this->hasMany('App\Bestelling', 'artikel_id');
    }

}
