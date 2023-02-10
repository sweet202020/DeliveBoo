@extends('layouts.app')

@section('content')
<div class="container m-auto py-3">
    <h1 class="mb-3">Restaurant Info</h1>
    <form action="{{ route('admin.restaurants.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- name -->
        <div class="mb-3">
            <label for="restaurant_name" class="form-label">Name</label>
            <input type="text" name="restaurant_name" id="restaurant_name" class="form-control @error('restaurant_name') is-invalid @enderror" placeholder="add restaurant name" aria-describedby="titleHlper" value="{{ old('restaurant_name') }}" required maxlength="80">
        </div>
        @error('restaurant_name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- address -->
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="add restaurant address" aria-describedby="titleHlper" value="{{ old('address') }}"required>
        </div>
        @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- opening time -->
        <div class="mb-3">
            <label for="opening_time" class="form-label">Opening Time</label>
            <input type="text" name="opening_time" id="opening_time" class="form-control @error('opening_time') is-invalid @enderror" placeholder="add opening time" aria-describedby="titleHlper" value="{{ old('opening_time') }}">
        </div>
        @error('opening_time')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- delivery price -->
        <div class="mb-3">
            <label for="delivery_price" class="form-label">Delivery Price</label>
            <input type="number" step="0.01" name="delivery_price" id="delivery_price" class="form-control @error('delivery_price') is-invalid @enderror" placeholder="add restaurant name" aria-describedby="titleHlper" value="{{ old('delivery_price') }}">
        </div>
        @error('delivery_price')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- vat -->
        <div class="mb-3">
            <label for="partita_iva" class="form-label">VAT</label>
            <input type="text" name="partita_iva" id="partita_iva" class="form-control @error('partita_iva') is-invalid @enderror" placeholder="add restaurant vat" aria-describedby="titleHlper" value="{{ old('partita_iva') }}"required>
        </div>
        @error('partita_iva')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- types -->
        <div class="mb-3">
            <label for="types" class="form-label">Types</label>
            <select multiple class="form-select form-select-lg"  name="types[]" id="types">
                <option value="" disabled>Select one</option>
                @forelse($types as $type)
                <option value="{{$type->id}}"{{in_array($type->id, old('types', [])) ? 'selected' : ''}} >{{$type->name}}</option>
                @empty
                <h6>Sorry.No technologies inside the database yet.</h6> 
                @endforelse
            </select>
        </div>
        @error('types')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <!-- image -->
        <div class="form-group mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="Add a cover image" aria-describedby="coverImgHelper">
        </div>
        @error('cover_image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <button type="submit" class="btn btn-primary">Send</button>


    </form>
</div>
@endsection