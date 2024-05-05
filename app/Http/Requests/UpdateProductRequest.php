<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'name'=>'string',
            'description'=>'string',
            'price'=>'numeric',
            'Product_Category_id'=>'numeric',
            'product_inventory_id'=>'numeric|between:1,10',
            'discount_id'=>[Rule::in(1,2,3)],
        ];
    }
}
