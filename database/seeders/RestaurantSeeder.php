<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $new_restaurant = new Restaurant();
            $new_restaurant->user_id = $faker->randomNumber(1, true);
            $new_restaurant->restaurant_name = $faker->word();
            $new_restaurant->address = $faker->sentence(3);
            $new_restaurant->suggest = $faker->randomElement([true, false]);
            $new_restaurant->opening_time = $faker->time();
            $new_restaurant->delivery_price = $faker->randomNumber(2, 10);
            // the png is not visible yet! TODO storage link
            $new_restaurant->cover_image = '/uploads/default.png';
            $new_restaurant->partita_iva = $faker->vat();
            $new_restaurant->save();
        }
    }
}
