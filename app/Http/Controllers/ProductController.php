<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Notadmin;
use App\Http\Requests\UpDateProducts;
use App\Models\Fav;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\User;
use App\Notifications\FavUpdate;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use HttpResponse;



    public function index()
    {
        // $products = Product::with('discount')->get();
        // // Calculate the net price for each product using the percentage
        // foreach ($products as $product) {
        //     $percentage = $product->discount->percent ;
        //     $status = $product->discount->status;
        //     if ($status == 'active') {
        //         $netprice = $product->price - ($product->price * $percentage / 100);
        //         $product->netprice = $netprice;
        //         $product->save();
        //     }else
        //     $netprice = $product->price;
        //     $product->netprice = $netprice;
        //     $product->save();
        //        }
        // return $products;

        // return 'ok';


        $products = Product::orderBy('id')->get();


        return $this->response(true, 200, 'ok', $products);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        if (Gate::allows('isuser')) {
            $data = $request->validated();
            $product = Product::create($data);

            return $this->response(true, 200, 'ok', $product);
        } else {
            return $this->response(false, 401, 'unauthorized', null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($product_id)
    {
        // $product =product::where('id', $product->id)->firstOrFail();
        //    $data =  product::max('id');


        $product = Product::find($product_id);


        if (empty($product)) {


            return $this->response(false, 201, 'bad request');
        } else {
            return $this->response(true, 200, 'ok', $product);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function updatemany(Request $request)
    {

        $products = $request->all();

        // dd($products);
        foreach ($products['id'] as $i => $id) {
            product::where('id', $id)
                ->update([
                    'price' => $products['price'][$i],
                    'name' => $products['name'][$i],
                ]);
        }
        return $this->response(true, 200, 'ok');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();

        // dd($user);

        if (Gate::allows('isuser')) {
            // dd($product);
            try {

                if ($product->update($data)) {
                    $favproduct = Fav::where('product_id', $product->id)->first();

                    auth()->user()->notify(new FavUpdate($product));

                    return $this->response(true, 200, 'ok', $data);
                }
            } catch (\Exception $e) {
                return $this->response(false, 400, $e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {



        if (Gate::allows('isuser')) {

            Fav::where('product_id', $product->id)->delete();
            if ($product->delete()) {

                return $this->response(true, 200, 'deleted');
            } else {
                return $this->response(false, 400, 'Bad Request');
            }
        } else {
            return $this->response(false, 401, 'unauthorized');
        }
    }
}
