<?php

namespace Database\Seeders;

use App\Models\Plate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $new_plate = new Plate();
            $new_plate->restaurant_id = $faker->randomNumber(1, true);
            $new_plate->name = $faker->randomWord();
            $new_plate->description = $faker->paragraph();
            $new_plate->price = $faker->randomFloat(2, 1, 900);
            $new_plate->best_seller = false;
            $new_plate->visible = true;
            // the png is not visible yet! TODO storage link
            $new_plate->cover_image = '/uploads/default.png';
            $new_plate->save();
        }
    }
}
