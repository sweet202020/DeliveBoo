<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlateRequest extends FormRequest
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
        return [
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:3|max:1000',
            'price'=>'required|max:5',
            'cover_image'=>'max:100',
            'best_seller'=>'boolean',
            'visible'=>'boolean',
            'category_id'=>'nullable|exists:categories,id'
        ];
    }
}
