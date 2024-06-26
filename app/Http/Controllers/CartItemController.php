<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use App\Models\Product;
use App\Models\User;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $id =  Auth()->user()->id;
        $user = User::find($id)->first();

        $allitem = CartItem::with('products')->where('user_id',$id)->get();

        $totalPrice = 0;

        foreach ($allitem as $item) {
            $totalPrice += $item->products->netprice * $item->quantity;
        }
        return $this->response(true,200,'ok',['cartitem'=>$allitem,'totalPrice' => $totalPrice,'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'product_id'=>'required',

        ]);
        $data['user_id'] = Auth()->user()->id;
        $data['quantity'] = 1;
        $cartItem = CartItem::create($data);
        if($cartItem){
            return $this->response(true,200,'ok',$cartItem);
        }else{
            return $this->response(false,406,'Not Acceptable');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id,)
    {
        $cart= CartItem::find($id);
        // return $cart;
        if ($cart) {
            $product = Product::find($cart->product_id);
            return $this->response(true,200,'ok',$product);
        }else{
            return $this->response(false,406,'Not Acceptable');
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,CartItem $cartItem)
    {
               $data= $request->validate([
                'quantity'=>'numeric|required|min:2'
               ]);
               if ($cartItem->update($data)) {
               return $this->response(true,200,'ok',$cartItem);
               }else{
                return $this->response(false,406,'Not Acceptable');
               }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartItem $cartItem)
    {
        // dd($cartItem);
        if ($cartItem->delete()) {
            return $this->response(true, 200, 'deleted');
        }else{
            return $this->response(false, 406, 'Not Acceptable');
        }
    }
}
