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
        $allPlates= $request->order_plate;
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
        for ($j = 0; $j < count($allPlates); $j++) {
            $plate = Plate::where('name', '=', $allPlates[$j]->name);
            $plate_id = $plate->id;
            $quantity = $plate->quantita;
            $new_order->plates()->attach($plate_id, array('quantity' => $quantity));
        }

        return response()->json([
            'success' => true,
            'results' => $data
        ]);
    }
}
