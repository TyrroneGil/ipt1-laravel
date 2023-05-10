<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function logout(Request $request){
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/')->with('success','Bye We hope to see you again!');
   } 
  
public function create(){
    return view('users.register');
   }
   public function store(Request $request){
    $formFields = $request->validate([
        'name'=>'required|min:6|alpha_num|unique:users,name',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:6'
      
       
    ]);
    $formFields['password']=bcrypt($formFields['password']);
        
   $user= User::create($formFields);

    auth()->login($user);
			
    return redirect('/')->with('success','Hello '.$user->name.' Welcome to my page');
       
   
   }

   public function login(){
    return view('users.login');
   }
   
   public function authenticate(Request $request){
    $formFields = $request->validate([
       
        'email'=>'required',
        'password'=>'required'
      
       
    ]);
    if(auth()->attempt($formFields)){
        $request->session()->regenerate();
         return redirect('/')->with('success','Hello Welcome to my page');
    }
        return back()->withErrors(['email'=>'Invalid Credentials']);
   } 
}
