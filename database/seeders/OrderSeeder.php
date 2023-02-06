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
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $new_order = new Order();
            $new_order->price = $faker->randomFloat(2, 1, 1000);
            $new_order->customer_name = $faker->word();
            $new_order->delivery_address = $faker->word();
            $new_order->phone_number = '3278983721' /* $faker->randomElements(['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'], 10) */;
            $new_order->save();
        }
    }
}
