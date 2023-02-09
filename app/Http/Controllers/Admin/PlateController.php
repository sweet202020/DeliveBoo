<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plate;
use App\Http\Requests\StorePlateRequest;
use App\Http\Requests\UpdatePlateRequest;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Auth::user()->restaurants->plates;
        
        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlateRequest $request)
    {
       /* dd($request);  */
        $val_data=$request->validated();

        if ($request->hasFile('cover_image')) {
            $cover_image = Storage::put('uploads', $val_data['cover_image']);
            $val_data['cover_image'] = $cover_image;
        }
        if(!isset($val_data['best_seller'])){
            $val_data['best_seller']=0;
        }
        if(!isset($val_data['visible'])){
            $val_data['visible']=0;
        }
        $plate_slug=Plate::createSlug($val_data['name']);
        $val_data['slug']=$plate_slug;
        $val_data['restaurant_id'] = Auth::User()->restaurants['id'];
        $plate=Plate::create($val_data);

        return to_route('admin.plates.index')->with('message', "$plate->name created successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        if(Auth::user()->restaurants['id'] == $plate['restaurant_id']){
            return view('admin.plates.show', compact('plate'));
        }
        return redirect()->route('admin.plates.index')->with('error', "Page Not Found - 404");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        if(Auth::user()->restaurants['id'] == $plate['restaurant_id']){
        return view('admin.plates.edit', compact('plate'));
        }
        return redirect()->route('admin.plates.index')->with('error', "Page Not Found - 404");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlateRequest  $request
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlateRequest $request, Plate $plate)
    {
        $val_data = $request->validated();
        if ($request->hasFile('cover_image')) {
            if($plate->cover_image){     
                Storage::delete($plate->cover_image);
            }
            $cover_image = Storage::put('uploads', $val_data['cover_image']);

            $val_data['cover_image'] = $cover_image;
        }
        if(!isset($val_data['best_seller'])){
            $val_data['best_seller']=0;
        }
        if(!isset($val_data['visible'])){
            $val_data['visible']=0;
        }
        $plate_slug=Plate::createSlug($val_data['name']);
        $val_data['slug']=$plate_slug;
        $plate -> update($val_data);
        return to_route('admin.plates.index')->with('message', "$plate->name update successfully");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plate  $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        if ($plate->cover_image) {
            Storage::delete($plate->cover_image);
        }
        $plate->delete();
        return to_route('admin.plates.index')->with('message', "$plate->name deleted successfully");
    }
}
