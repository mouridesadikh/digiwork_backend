<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $fillable = [
        'titre' , 'date_pub' , 'date_exp' , 'description' , 'etat'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    



}
