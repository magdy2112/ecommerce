<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Gate::denies('isuser')) {
            return false;

        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string',
            'description'=>'required|string',
            'price'=>'required|numeric',
            'Product_Category_id'=>'required|numeric',
            'product_inventory_id'=>'required|numeric|between:1,10',
            'discount_id'=>[Rule::in(1,2,3)],



        ];
    }
}
