<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Plate;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make($data, [
            'price' => 'required|max:6',
            'customer_name' => 'required|max:100',
            'delivery_address' => 'required|max:100',
            'phone_number' => 'required|max:13',
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

        $allPlates= $request->order_plate;

        foreach ($allPlates as $singlePlate) {
            $new_order->plates()->attach($singlePlate['id'], array('plate_quantity' =>$singlePlate['quantita']));
        }

        return response()->json([
            'success' => true,
            'results' => $data
        ]);
    }
}
