<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        if (Gate::allows('isuser')) {
          $user = user::where('id', '=', Auth()->user()->id)->firstOrFail();
        //   $user = user::

          return $user;

          }else{return 'false';}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(gate::allows('isuser')){
            $user = user::where('id', '=', Auth()->user()->id)->first();
            $user->delete();
            return $this->response(true, 200, 'deleted');

        }else{
            return $this->response(false, 403, 'forbidden');
        }
    }
}
