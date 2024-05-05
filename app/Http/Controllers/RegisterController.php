<?php

namespace App\Http\Controllers;

use App\Events\RegisterEvent;
use App\Http\Requests\RegisterUserRequest;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    use HttpResponse;
    function register(RegisterUserRequest $request){

        $data= $request->validated();

        $data['password'] = Hash::make($data['password']);


       $user= User::create($data);


          if ($user->fails) {
            return $this->response(false,406,'Not Acceptable');
          }else{
            event(new Registered($user));

            RegisterEvent::dispatch($user);
            return $this->response(true,201,'Created',$user);
          }

    }

}
