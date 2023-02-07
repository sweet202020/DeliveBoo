<?php

namespace Database\Seeders;

use App\Models\Plate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plates = config('db.plates');
        foreach($plates as $plate){
            $new_plate = new Plate(); 
            $new_plate->name = $plate['name'];
            $new_plate->slug = Str::slug($new_plate->name, '-');
            $new_plate->description = $plate['description'];
            $new_plate->price = $plate['price'];
            $new_plate->best_seller = $plate['best_seller'];
            $new_plate->visible = $plate['visible'];
            $new_plate->restaurant_id = $plate['restaurant_id'];
            $new_plate->cover_image = $plate['cover_image'];
            $new_plate->save();
        }
     
    }
}
