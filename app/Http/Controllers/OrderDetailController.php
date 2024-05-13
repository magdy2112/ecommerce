<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Models\Product;
use App\Models\User;
use App\Traits\HttpResponse;

class OrderDetailController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $id = auth()->user()->id;
        $allorder = OrderDetail::with('product')->where('user_id', $id)->get();
        $user = User::where('id', $id)->get();

   
        return  $this->response(true, 200, 'ok', ['allorder' => $allorder, 'user' => $user]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderDetailRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'pending';

        $order = OrderDetail::create($data);
        return $this->response(true, 200, 'ok', $order);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
