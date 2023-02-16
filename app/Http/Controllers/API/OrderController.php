<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'price' => 'required|max:6',
            'customer_name' => 'required|max:100',
            // 'plate_id' => 'required|exists:plates,id',
            // 'plate_quantity' => 'required',
            'delivery_address' => 'required|max:100',
            'phone_number' => 'required|max:13'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_order = new Order();
        $new_order->fill($data);
        $new_order->save();

        return response()->json([
            'success' => true
        ]);
    }
}
