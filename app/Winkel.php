<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winkel extends Model
{
    protected $primaryKey = 'winkel_id';

    public function artikel(){
        return $this->hasMany('App\Artikel');
    }

    public function bestellingen(){
        return $this->hasMany('App\Bestelling');
    }
}
