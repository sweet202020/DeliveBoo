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
            $new_order->costumer_name = $faker->randomWord();
            $new_order->delivery_address = $faker->randomNumber(12, true);
            $new_order->save();
        }
    }
}
