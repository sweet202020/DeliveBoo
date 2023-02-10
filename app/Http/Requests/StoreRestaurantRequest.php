<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'restaurant_name'=>'required|max:80',
            'address'=>'required|max:100',
            'delivery_price' =>'required|numeric|min:0.0|not_in:0',
            'cover_image' => 'nullable|image|max:300',
            'partita_iva' => 'required|max:20',
            'types'  => 'nullable|exists:types,id',
            'open' => 'nullable|date_format:H:i',
            'close' => 'nullable|date_format:H:i'
        ];
    }
}
