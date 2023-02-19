@extends('layouts.admin')

@section('content')
    <form action="{{ route('admin.restaurants.update', $restaurant->slug) }}" method="post" enctype="multipart/form-data">
        @if (session('message'))
            <div class="alert alert-success ms-5 me-5">
                {{ session('message') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container m-auto py-">
            <h1 class="mb-3">Restaurant Info</h1>
            @csrf
            @method('PUT')
            <!-- name -->
            <div class="mb-3">
                <label for="restaurant_name" class="form-label">Name</label>
                <input type="text" name="restaurant_name" id="restaurant_name"
                    class="form-control @error('restaurant_name') is-invalid @enderror" placeholder="add restaurant name"
                    aria-describedby="titleHlper" value="{{ old('restaurant_name', $restaurant->restaurant_name) }}"
                    required maxlength="80">
            </div>
            @error('restaurant_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- address -->
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror" placeholder="add restaurant address"
                    aria-describedby="titleHlper" value="{{ old('address', $restaurant->address) }}"required
                    maxlength="100">
            </div>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="d-flex gap-3">
                <!-- opening time -->
                <div class="mb-3">
                    <label for="open" class="form-label">Opening Time</label>
                    <input type="time" name="open" id="open" class="form-control" placeholder="add opening time"
                        aria-describedby="titleHlper" value="{{ old('open') }}">
                </div>
                @error('open')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!-- closing time -->
                <div class="mb-3">
                    <label for="close" class="form-label">Closing Time</label>
                    <input type="time" name="close" id="close" class="form-control " placeholder="add opening time"
                        aria-describedby="titleHlper" value="{{ old('close') }}">
                </div>
                @error('close')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <h6>L'orario attuale d'apertura è dalle: {{ old('opening_time', $restaurant->opening_time) }}</h6>


            <!-- delivery price -->
            <div class="mb-3">
                <label for="delivery_price" class="form-label">Delivery Price</label>
                <input type="number" step="0.01" name="delivery_price" id="delivery_price"
                    class="form-control @error('delivery_price') is-invalid @enderror" placeholder="add delivery price"
                    aria-describedby="titleHlper" value="{{ old('delivery_price', $restaurant->delivery_price) }}"
                    max="100" min="0.01" required>
            </div>
            @error('delivery_price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- vat -->
            <div class="mb-3">
                <label for="partita_iva" class="form-label">VAT</label>
                <input type="text" name="partita_iva" id="partita_iva"
                    class="form-control @error('partita_iva') is-invalid @enderror" placeholder="add restaurant vat"
                    aria-describedby="titleHlper" value="{{ old('partita_iva', $restaurant->partita_iva) }}"required
                    maxlength="20">
            </div>
            @error('partita_iva')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- types -->
            <div class="mb-3">
                <label for="types" class="form-label">Types</label>
                <select multiple class="form-select form-select-lg" name="types[]" id="types">
                    <option value="" disabled>Select Types</option>
                    @forelse($types as $type)
                        @if ($errors->any())
                            <option
                                value="{{ $type->id }}"{{ in_array($type->id, old('types', [])) ? 'selected' : '' }}>
                                {{ $type->name }}</option>
                        @else
                            <option
                                value="{{ $type->id }}"{{ $restaurant->types->contains($type->id) ? 'selected' : '' }}>
                                {{ $type->name }}</option>
                        @endif
                    @empty
                        <h6>Sorry.No types inside the database yet.</h6>
                    @endforelse

                </select>
            </div>
            @error('types')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <!-- image -->

            @if ($restaurant->cover_image)
                <img width="140" src="{{ asset('storage/' . $restaurant->cover_image) }}" alt="">
            @else
                <div class="segnaposto">
                    <h6>placeholder</h6>
                </div>
            @endif

            <div class="form-group mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" class="form-control" name="cover_image" id="cover_image"
                    placeholder="Add a cover image" aria-describedby="coverImgHelper">
            </div>
            @error('cover_image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <button type="submit" class="btn btn-primary">Send</button>


        </div>
    </form>
    <style>
        form {
            padding: 4rem 2rem;
            background-image: url('/img/sfondo.jpeg');
            background-size: cover
        }

        .container {
            background-color: #ff9e45;
            padding: 1rem;
            border-radius: 2rem
        }
    </style>
@endsection
