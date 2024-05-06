<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;
use App\Models\Product;
use App\Traits\HttpResponse;

class DiscountController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Discount::get();
        $discount_count = Discount::with('products')->get();
        //  return $discount_count;

        $discountProductCounts = [];

        foreach ($discount_count as $item) {
            $discountProductCounts[] = "discount Product Count =>"  . count($item->products) ."=>discount =>" . $item->type;
        }
        // return $this->response(true, 200, 'ok',   $discountProductCounts);

        return $this->response(true,200,'ok',   ['discount'=>$data,'discountProductCounts'=>$discountProductCounts]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscountRequest $request)
    {
        $data= $request->validated();
        if ($data) {
          $discount =discount::create($data);
          return $this->response(true, 200, 'ok', $discount);
        }else{
            return $this->response(false, 406, 'Not Acceptable');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
            //  return $discount->id;
            $discount = Discount::find($id);
            if ($discount) {
                return $this->response(true, 200, 'ok', $discount);
            }else{
                return $this->response(false, 406, 'Not Acceptable');
            }


    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscountRequest $request,$id)
    {

        $discount = Discount::find($id);
        $data = $request->validated();
        if ($discount->update($data)) {
            return $this->response(true, 200, 'ok', $data);
        }else{
            return $this->response(false, 406, 'Not Acceptable');
            // return $discount;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $discount = Discount::find($id);
        if ($discount->delete()) {
        //  $product_discount= Product::where('discount_id',$id)->get();
        //   foreach ($product_discount as $item) {
        //       $item->discount_id=0;
        //       $item->save();
        //   }
            return $this->response(true, 200, 'deleted');
        }else{
            return $this->response(false, 406, 'Not Acceptable');
        }
    }
}
