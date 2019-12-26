<?php
use Illuminate\Notifications\Notifiable;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $fillable = [
        'libele','image'
    ];

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
