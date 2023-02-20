<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = Restaurant::with('users', 'plates', 'types')->paginate(5);
        if ($restaurants) {
            return response()->json([
                'success' => true,
                'results' => $restaurants
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => null
            ]);
        }
    }


    public function filter($nomi)
    {

        $finalFilter =[];
        $names =explode(',',$nomi);
            $restaurants = Restaurant::with('users', 'plates', 'types')->whereHas('types', function($q) use ($names) {
                $q->whereIn('name', $names);
            })->get();
            foreach ($restaurants as $restaurant) {
                if(!in_array($restaurant, $finalFilter) && count($restaurant->types) >= count($names)){
                    array_push($finalFilter, $restaurant);
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
