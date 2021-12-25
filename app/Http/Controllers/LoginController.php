<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\loginController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';


    public function __construct(){
        $this->middleware('AlreadyLogged');
    }
    function index(){
        return view('login');
    }

    // function auth_login(Request $request){
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //         'g-recaptcha-response' => 'recaptcha',
    //     ]);
        
    //     $user = Admin::where('email',$request->email)->first();
    //     if($user){
    //         if($user->password === $request->password){
    //             $request->session()->put('loggedUser',$user) ;
    //             return redirect()->route('list');
    //         } else{
    //             return back()->with('error', 'Invalid password');
    //         }
    //     } else{
    //         return back()->with('error', 'No user found with this email.');
    //     }
    // }

    function auth_login(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
      
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/dashboard');
        }
        return back();
    }

    
}
