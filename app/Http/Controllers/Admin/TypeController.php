<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id() === 1) {
            $types = Type::orderByDesc('id')->get();
            return view('admin.types.index', compact('types'));
        }
        return to_route('admin.dashboard')->with('message', 'Page not found');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        if (Auth::id() === 1) {
            $val_data = $request->validated();
            Type::create($val_data);
            return to_route('admin.types.index')->with('message', 'Type created successfully');
        }
        return to_route('admin.dashboard')->with('message', 'Page not found');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        if (Auth::id() === 1) {
            $val_data = $request->validated();
            $type->update($val_data);
            return to_route('admin.types.index')->with('message', "$type->name updated successfully");
        }
        return to_route('admin.dashboard')->with('message', 'Page not found');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        if (Auth::id() === 1) {
            $type->delete();
            return to_route('admin.types.index')->with('message', "$type->name deleted successfully");
        }
        return to_route('admin.dashboard')->with('message', 'Page not found');
    }
}
