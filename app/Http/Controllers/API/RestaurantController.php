<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'results' => Restaurant::with('plates', 'types')->orderByDesc('id')->paginate(2),
        ]);
    }

    public function show($name)
    {
        
        $restaurant = Restaurant::with('users', 'plates', 'types')->whereHas('types', function($q) use ($name) {
            $q->where('name', '=', $name);
        })->get();

        if (count($restaurant)>0) {
            return response()->json([
                'success' => true,
                'results' => $restaurant
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Post not found'
            ]);
        }
    }
}
