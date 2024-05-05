<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use App\Http\Requests\StorefavRequest;
use App\Http\Requests\UpdatefavRequest;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Request;

class FavController extends Controller
{

    use HttpResponse;



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Fav $fav)
    {
        $fav_product = $request->validate([
            'product_id' => 'required|numeric',

        ]);
        $fav_product['user_id'] = Auth()->id();

             //check if user already fav this product
        if (Gate::allows('isuser')) {
            $exist = Fav::where([
                'user_id' => $fav_product['user_id'],
                'product_id' => $fav_product['product_id'],

            ])->count();
            IF($exist) {
                return $this->response(false, 400,'already exist');
            }
            $data = fav::create($fav_product);
            return $this->response(true, 200, 'ok', $data);
        } else {
            return $this->response(false, 401, 'Unauthorized');
        }
    }

    /**
     * Display the list of fav per user of the resource.
     */
    public function show()
    {

            $fav = Fav::where('user_id',auth()->id())->with('product')->get();
            return $this->response(true, 200, 'ok', $fav);

    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request, Fav $fav)
    {


// dd($fav);

        if (auth()->user()->id == $fav->user_id) {
            $fav->delete();
            return $this->response(true, 200, 'deleted');
        } else {
            return $this->response(false, 401, 'Unauthorized');
        }
    }
}
