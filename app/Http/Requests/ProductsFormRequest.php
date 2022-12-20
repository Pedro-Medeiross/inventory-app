<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->method() === 'PUT') {
            return [
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'store_id' => 'required|exists:stores,id',
                'productimage' => 'nullable|image',
            ];
        }
        return ['name'=>'required|min:3|max:255',
                'description'=>'required|min:3|max:1000',
                'price'=>'required|numeric',
                'quantity'=>'required|numeric',
                'productimage'=>'required|image',
        ];
    }
}
