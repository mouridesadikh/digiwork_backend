<?php

namespace App\Http\Controllers;
use App\Domaine;
use App\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    //
    
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
       //dd(Auth::user()->etat );
        if(Auth::user()->etat == 1)
        {

        }else{
            //dd('');
            return view('admin/index');
        }
       
    }

    public function listDomaine(){
        $message='';
        $code='';
        $result = Domaine::with('specialite')->get();
        return view('admin/add_domaine',['resultat' => $result,'message' => $message ,'code' => $code]);

    }
   
   public function saveDomaine(Request $request){

    $request->validate([
        'image' => 'required',
    ]);
    $message='';
    $code = 1 ;
    $image = $request->file('image');
    $image = file_get_contents($image);
    $image = base64_encode($image);
    $status = Domaine::create(
        [
            "libele" => $request->libele,
            "images"  =>  $image
        ]
    );
    if($status)
    {
        $message = "success" ;
    }else{
        $message = "error";
    }
    $result = Domaine::with('specialite')->get();
    return redirect()->route('listDomaine',['resultat' => $result , 'message' => $message ,'code' => $code ]);
   }

   public function deleteDomaine(Request $request){
     $id = $request->id;
     $code = 2;
     $message ="";
     $status =  DB::table('domaines')->where('id','=',$id)->delete();
     if($status)
     {
     $message =  'success';
     }else{
     $message = 'error';
     }
   
     $result = Domaine::with('specialite')->get();
     return redirect()->route('listDomaine',['resultat' => $result , 'message' => $message ,'code' => $code ]);

   }

   // specialirte fonction

   public function saveSpecialite(Request $request){
       $domaine =  DB::table('domaines')->where('id','=',$request->id_domaine)->first();
      // dd($domaine->id);
       $specialite = new Specialite();
       $message='';
       $code = 2 ;
       $image = $request->file('image');
       $image = file_get_contents($image);
       $image = base64_encode($image);
       $specialite->libele = $request->libele;
       $specialite->images = $image;
       $specialite->domaine()->associate($domaine->id);
       $specialite->save();
      // $result = DB::table('domaines')->get();
       $result = Domaine::with('specialite')->get();
       return redirect()->route('listDomaine',['resultat' => $result , 'message' => $message ,'code' => $code ]);
       //return view('admin/add_domaine',['resultat' => $result , 'message' => $message ,'code' => $code ]);
   }

   public function deleteSpecialite(Request $request){
    $id = $request->id;
    $code = 2;
    $message ="";
    $status =  DB::table('specialites')->where('id','=',$id)->delete();
    if($status)
    {
    $message =  'success';
    }else{
    $message = 'error';
    }
  
    $result = Domaine::with('specialite')->get();
    return redirect()->route('listDomaine',['resultat' => $result , 'message' => $message ,'code' => $code ]);
   }
}
