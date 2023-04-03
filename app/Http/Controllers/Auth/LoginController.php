<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

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

    use AuthTrait;

    // use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm(Request $request,$type){

        return view('auth.login',compact('type'));
    }

    public function login(Request $request){
        // dd(Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password]));



        if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashborad');
            // return $request;
            return redirect('$this->$re');
        }else{
            return redirect()->route('selection');
        }

        // else{
        //     dd($request);
        // }

    }}

    // public function logout(Request $request)
    // {
    //     Auth::guard($type)->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect()->route('classes');
    // }


