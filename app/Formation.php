<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    //
    protected $fillable = [
        'titre','annee','description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
