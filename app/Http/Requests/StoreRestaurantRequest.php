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
            'opening_time' => 'nullable|max:50',
            'delivery_price' =>'nullable|max:7',
            'cover_image' => 'nullable|image|max:300',
            'partita_iva' => 'required|max:20',
            
        ];
    }
}
