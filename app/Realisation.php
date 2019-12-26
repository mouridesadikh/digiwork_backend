<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realisation extends Model
{


    protected $fillable = [
        'titre','annee','image','lien','description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}
