<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'niveau' => $data['niveau'],
            'region' => $data['region'],
            'groupe' => $data['groupe'],
        ]);
    }
}
// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use App\User;
// use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

// class RegisterController extends Controller
// {
//     /*
//     |--------------------------------------------------------------------------
//     | Register Controller
//     |--------------------------------------------------------------------------
//     |
//     | This controller handles the registration of new users as well as their
//     | validation and creation. By default this controller uses a trait to
//     | provide this functionality without requiring any additional code.
//     |
//     */

//     use RegistersUsers;

//     /**
//      * Where to redirect users after registration.
//      *
//      * @var string
//      */
//     protected $redirectTo = RouteServiceProvider::HOME;

//     /**
//      * Create a new controller instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         $this->middleware('guest');
//     }

//     // public function store(Request $request)
//     // {
//     //     //Création de l'utilisateur
//     //     $user= new User;

//     //         $user->pseudo = $request->input('pseudo');
//     //         $user->email = $request->input('email');
//     //         /*'mdp' => Hash::make($request->input['mdp']),*/
//     //         $user->mdp = $request->input('mdp');
//     //         $user->niveau = $request->input('niveau');
//     //         $user->region = $request->input('region');
//     //         //$user->groupe = $request->input('groupe');
//     //         $user->save();
//     //         return view('rando_ok');
//     // }

//     /**
//      * Get a validator for an incoming registration request.
//      *
//      * @param  array  $data
//      * @return \Illuminate\Contracts\Validation\Validator
//      */
//     protected function validator(array $data)
//     {
//             // console.log('validator');
//             // console.log($data);

//         return Validator::make($data, [
//             'pseudo' => 'required|string|max:255',
//             'email' => 'required|string|email|max:255|unique:users',
//             'mdp' => 'required|string|min:8|confirmed',
//             'niveau'=>'string',
//             'region'=>'string',
//             // 'groupe'=>'string',
//         ]);
//     }

//     /**
//      * Create a new user instance after a valid registration.
//      *
//      * @param  array  $data
//      * @return \App\User
//      */
//     protected function create(array $data)
//     {
//         // console.log('create');
//         // console.log($data);
//         return User::create([
//             'pseudo' => $data['pseudo'],
//             'email' => $data['email'],
//             'mdp' => Hash::make($data['mdp']),
//             'niveau' => $data['niveau'],
//             'region' => $data['region'],
//             // 'groupe' => $data['groupe'],
//         ]);
//     }
// }


/*    
    }*/