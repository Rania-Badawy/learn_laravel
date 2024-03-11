<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(){
        
        return view("Auth.register");
     }

     public function addRegister(Request $request){
       $data = $request->validate([
          "name"      =>"required|string|max:100",
          "email"     =>"required|email|unique:users,email",
          "password"  =>"required|confirmed",
        ]);
        User::create($data);
        return redirect(url("/login"));
     }

    public function login(){
         return view("Auth.login");
      }
 
      public function checkLogin(Request $request){
        $data = $request->validate([
           "email"     =>"required|email",
           "password"  =>"required|string",
         ]);
         $data['password']=bcrypt($data['password']);
         Auth::attempt(["email"=>$data['email'],'password'=>$data['password']]);
         return redirect(url("/categories"));
      }

      public function logout(){
        Auth::logout();
        return redirect(url("/login"));
     }

     public function allUsers(){
      $users=User::all();
      dd($users);
   }
 
      
}
