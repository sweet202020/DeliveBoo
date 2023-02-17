<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $restaurants = config('db.restaurants');

        foreach ($restaurants as $restaurant) {
            $type_numbers = [];
            for ($i = 0; $i < 1; $i++) {
                $number = random_int(1, 10);
                if (in_array(!$number, $type_numbers)) {
                    array_push($type_numbers);
                }
            }
            $new_restaurant = new Restaurant();
            $new_restaurant->restaurant_name = $restaurant['restaurant_name'];
            $new_restaurant->slug = Str::slug($new_restaurant->restaurant_name, '-');
            $new_restaurant->address = $restaurant['address'];
            $new_restaurant->opening_time = $restaurant['opening_time'];
            $new_restaurant->delivery_price = $restaurant['delivery_price'];
            $new_restaurant->cover_image = $restaurant['cover_image'];
            $new_restaurant->partita_iva = $restaurant['partita_iva'];
            $new_restaurant->user_id = $restaurant['user_id'];
            $new_restaurant->types()->syncWithoutDetaching($type_numbers);
            $new_restaurant->save();
            $type_numbers = [];
        }
    }
}
