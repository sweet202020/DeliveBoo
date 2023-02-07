<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('db.orders');
        foreach ($orders as $order) {
            $new_order = new Order();
            $new_order->price = $order['price'];
            $new_order->customer_name = $order['customer_name'];
            $new_order->delivery_address = $order['delivery_address'];
            $new_order->phone_number = $order['phone_number'];
            $new_order->save();
        }
       
    }
}
