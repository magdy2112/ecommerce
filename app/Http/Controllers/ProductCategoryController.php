<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\Product;
use App\Traits\HttpResponse;

class ProductCategoryController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $allcattegory =   ProductCategory::get();

    return   $this->response(true,200,'ok',$allcattegory);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
    {
              $data = $request->validated();
              $data_store = ProductCategory::create($data);

              if ( $data_store) {
               return $this->response(true,200,'ok',$data) ;
              }else{
                return $this->response(false,406,'Not Acceptable');
              }


    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoryRequest $request, $id )
    {
          $data = $request->validated();
          $productCategory = ProductCategory::find($id);
           $data_updated = $productCategory->update($data);

          if ( $data_updated) {
            return $this->response(true, 200, 'ok', $data);
          }else{
            return $this->response(false, 406, 'Not Acceptable');
          }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $productcategory = ProductCategory::find($id);
        $deleted_data = $productcategory->delete();
        if ($deleted_data) {
            return $this->response(true, 200, 'deleted');
        }else{
            return $this->response(false, 406, 'Not Acceptable');
        }
    }

    public function product_category($id){
        $productcategorycount = Product::with('category')->where('Product_Category_id',$id)->count();
        $productcategory = Product::with('category')->where('Product_Category_id',$id)->get();

        return  $this->response(true,200,'ok',['productcategorycount'=>$productcategorycount,'productcategory'=>$productcategory]);
    }
}
