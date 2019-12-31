<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Domaine;
use App\Specialite;
use App\User;
use App\Annonce;
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

    public function saveProfil(Request $request){

        $id = Auth::user()->id;
        $image = $request->file('photo');
        $image = file_get_contents($image);
        $image = base64_encode($image);
        $specialite = Specialite::find($request->specialite);
        User::find($id)->update(
            ['nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'photo'=>$image,
            'sexe'=>$request->sexe ,
            'etat'=>1]);
        $user = User::find($id);
        $user->specialite()->attach($specialite);
       
        return redirect()->route('home');
    }

    public function listeAnnonces(){
        $result = Annonce::all();
        return \view('prestataire/annonces',['annonces' => $result]);

    }
}