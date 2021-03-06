<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Http\Request;
// use Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'tel' => ['required','string','max:255'],
            'adr' => ['required','string','max:255'],
            'lat'=> ['required','string','max:255'],
            'lng'=> ['required','string','max:255'],
            'profil' => ['required','string','max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'telephone' => $data['tel'],
            'adresse' => $data['adr'],
            'adresse_complet' => $data['adr_c'],
            'profil' => $data['profil'],
            'etat' => false,
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // protected function register(Request $request){
    //     $input = $request->all();
    //     $validator = $this->validator($input);
    //     if($validator->passes()){
    //         $data = $this->create($input)->toArray();
    //         $data['token'] = str_random(25);
    //         $user = User::find($data['id']);
    //         $user->token = $data['token'];
    //         $user->save();
          
    //         Mail::send('mails.confirmation', $data , function($message)use($data){
               
    //             $message->to($data['email']);
               
    //             $message->subject('Confirmer votre inscription');
              
              
    //         });
    //         return redirect(route('login')->with('status' , 'Un message de confirmation est envoyé . vérifié votre email'));
               
    //     }
    //     return redirect(route('login')->with('status' , $validator->errors));
        
    // }
    // public function confirmation($token){
    //     $user = User::where('token',$token)->first();
    //     if(!is_null($user))
    //     {
    //         $user->confirmed = 1;
    //         $user->token = '';
    //         $user->save();
    //         return redirect(route('login')->with('status' , 'Votre compte est activé'));

    //     }
    //     return redirect(route('login')->with('status' , 'Probleme '));

    // }
}
