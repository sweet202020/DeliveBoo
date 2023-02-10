<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->restaurants){
            $restaurant = Restaurant::find(Auth::id());
            return redirect()->route('admin.restaurants.edit', compact('restaurant'))->with('error', "Restaurant profile already existing.");
        }
        $types = Type::all();
        return view('admin.restaurants.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
       $val_data = $request->validated();
        if ($request->hasFile('cover_image')){
            $img_path = Storage::disk('public')->put('restaurant_images', $request['cover_image']);
            $val_data['cover_image'] =   $img_path;
        }
        $slug_data = Restaurant::createSlug($val_data['restaurant_name']);
        $val_data['slug'] =  $slug_data;
        $val_data['user_id'] = Auth::id();
        if ($request['open'] && $request['open'] ){        
            $open = strval($request['open']);
            $close = strval($request['close']);
            $val_data['opening_time'] = $open . "/" . $close;}
        $restaurant = Restaurant::create($val_data);
        if ($request->has('types')) {
            $restaurant->types()->attach($val_data['types']);
        }

        return redirect()->route('admin.dashboard')->with('message', "$restaurant->restaurant_name add successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
       /*  return view('dashboard', compact('restaurant')); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        if(Auth::id() === $restaurant['user_id']){
            $types = Type::all();
            return view('admin.restaurants.edit', compact('restaurant','types')); 
        }
        
        return redirect()->route('admin.dashboard')->with('message', "Page not found - 404");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRestaurantRequest  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
      
        $val_data = $request->validated();
        if ($request['cover_image']){
            if($restaurant['cover_image']){
                Storage::disk('public')->delete($restaurant->cover_image);
            }
            $img_path = Storage::disk('public')->put('restaurant_images', $request['cover_image']);
            $val_data['cover_image'] =  $img_path;
        }

        $slug_data = Restaurant::createSlug($val_data['restaurant_name']);
        $val_data['slug'] =  $slug_data;
        if ($request['open'] && $request['open'] ){        
            $open = strval($request['open']);
            $close = strval($request['close']);
            $val_data['opening_time'] = $open . "/" . $close;}
    
        // dd($val_data);
        $restaurant->update($val_data);
        
        if ($request->has('types')) {
            $restaurant->types()->sync($val_data['types']);
        } else {
            $restaurant->types()->sync([]);
        }

        return redirect()->route('admin.restaurants.edit', compact('restaurant'))->with('message', "$restaurant->restaurant_name update successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
