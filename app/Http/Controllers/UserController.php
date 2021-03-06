<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;

class UserController extends Controller
{
    public function __construct() {
@session_start();
    }

    public function postlogin(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credenticals = $request->only('username', 'password');
        if(Auth::attempt($credenticals)) {
            return redirect('/student');
        } else {
            return redirect('/login')->with('notice', 'wrong username or password');
        }
    }

    public function admin()
    {

      if(Auth::check()){
        $_SESSION['admin'] = Auth::user()->name;
        return view('student.view');
      } else {  return redirect("/login")->with('errors', 'Opps! You do not have access');}
    
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return Redirect('/login')->with('notice', 'logout successed!!');
    }
}
