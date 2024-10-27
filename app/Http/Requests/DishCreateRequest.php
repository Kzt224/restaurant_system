<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'category' => 'required',
            'price'   => 'required|integer',
            'dish_image'=> 'required',
        ];
    }
}
