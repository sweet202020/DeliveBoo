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
            'delivery_address' => 'required|max:100',
            'phone_number' => 'required|max:13',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        // if ($request->has('order_plate')) {
        //     for ($i = 0; $i < count($request['order_plate']); $i++) {
        //         $plate_quantity = $request['order_plate'][$i]->quantita;
        //         $plate_id = $request['order_plate'][$i]->id;
        //         $new_order->plates()->attach($request['order_plate'][$i]);
        //     }
        // }

        // define('DB_SERVERNAME', "localhost");
        // define('DB_USERNAME', "root");
        // define('DB_PASSWORD', "root");
        // define('DB_NAME', "deliveboo");
        // if (isset($nome) && $cognome) {
        //     $conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);
        //     $invio = $conn->prepare("INSERT INTO users (name, surname) VALUE (?,?)");
        //     $invio->bind_param("ss", $nome, $cognome);
        //     $invio->execute();
        //     $conn->close();
        // }

        $new_order = new Order();
        $new_order->fill($data);
        $new_order->save();

        return response()->json([
            'success' => true,
            'results' => $data
        ]);
    }
}
