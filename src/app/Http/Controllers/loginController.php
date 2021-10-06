<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('/');
        }
        else{
            return View('login'); 
        }
    }
    public function login(Request $request)
    {
     
        $user = $request->only('email', 'password');
        if (isset($request)) {
            $login = new User();
            if($login->checklogin($user)==true)
            {
                return redirect('/');
            }
        }
        else{
            dd('error');
        }
    }
    public function logout()
    {
        Auth::logout();
    }
}
