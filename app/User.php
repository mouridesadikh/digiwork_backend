<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'telephone','email','adresse','adresse_complet','profil','etat','lat','lng','email','nom','prenom','photo','sexe','confirmed','password',
    ];

    public function formation()
    {
    	return $this->hasMany(Formation::class);
    }
    
    public function experience(){
        return $this->hasMany(Experience::class);
    }

    public function realisation(){
        return $this->hasMany(Realisation::class); 
    }

    public function competence()
    {
        return $this->hasMany(Competence::class);
    }
    public  function annonce()
    {
        return $this->hasMany(Annonce::class);
    }

    public function specialite(){
        return $this->belongsToMany(Specialite::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
