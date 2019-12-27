<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Domaine;
class PrestataireController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        return View('prestataire/index');
    }
    

    public function valideProfil(){

        $result = Domaine::with('specialite')->get();
        return View('prestataire/valide_profil' , ['domaines'=> $result]);

    }
}