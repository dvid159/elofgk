<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        // $this->middleware('is_admin')->except('logout');
        // $this->middleware('is_docente')->except('logout');
    }


public function login(Request $request)
    {   

        $input = $request->all();
   
        $this->validate($request, [
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
   
      
        if(auth()->attempt(array('carnet' => $input['name'], 'password' => $input['password'])))
        { 
            
            if (auth()->user()->is_admin == 1){
                return redirect()->route('admin.home');
            }elseif(auth()->user()->is_docente == 1){
                return redirect()->route('docente.home');
            }else{
                return redirect()->route('home');
            }
        }else{
           return redirect()->route('login')->withErrors(['name' => 'Estas credenciales no concuerdan con nuestros registros'])
           ->withInput(request(['name']));
        }
          
    }


}
