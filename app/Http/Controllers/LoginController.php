<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponse;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    use HttpResponse;
  public function login(LoginRequest $request){

        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
             $user_data=user::where('email','=',$credentials['email'])->firstOrFail();
             $roles_arr = explode(" ",$user_data->role) ;
             $token= $user_data->createToken('login' . $user_data->id,$roles_arr)->plainTextToken;
             return $this->response(true,200,'logedin',['user'=>$user_data , 'token'=>$token]);

         }else {
             return $this->response(false,401,'log in fail');
        }


  }
  public function logout( ){

      return 'ok';
  }

}
