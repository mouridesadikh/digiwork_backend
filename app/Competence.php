<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    //

    protected $fillable = [
        'titre'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
