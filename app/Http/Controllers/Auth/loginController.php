<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{


   
    public function __construct(){

        $this->middleware(['guest']);
    
    }





    public function index(){

return view('auth.login');

    }

    public function store(Request $request){


       
    $request->validate([
      
        'email' => 'required|email',
        'password' => 'required',
    ]);


   if (!auth()->attempt($request->only('email', 'password'),$request->remember)){

    return back()->with('status', 'invalid log details');


   }else{


    return redirect()->route('dashboard');

   } 

    


}





}
