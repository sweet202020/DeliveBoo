<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function filter($nomi)
    {

        $finalFilter =[];
        $names =explode(',',$nomi);
        foreach ($names as $name) {
            $restaurants = Restaurant::with('users', 'plates', 'types')->whereHas('types', function($q) use ($name) {
                $q->where('name', '=', $name);
            })->get();
            foreach ($restaurants as $restaurant) {
                if(!in_array($restaurant, $finalFilter) && count($restaurant->types) >= count($names)){
                    array_push($finalFilter, $restaurant);
                }
            }
 
        }
     

        if (count($finalFilter)>0) {
            return response()->json([
                'success' => true,
                'results' => $finalFilter
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ]);
        }
    }
    public function show($slug)
    {

        $restaurant = Restaurant::with('users', 'plates', 'types')->where('slug', '=', $slug)->first();

        if ($restaurant) {
            return response()->json([
                'success' => true,
                'results' => $restaurant
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ]);
        }
    }
}
