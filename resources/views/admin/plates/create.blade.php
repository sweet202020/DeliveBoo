@extends('layouts.admin')
@section('content')
    <form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <h1 class="text-uppercase text-center mt-3">add plate</h1>
            @include('partials.errors')
            <div class="mb-3">
                <label for="name" class="form-label">plate's name</label>
                <input required type="text" name="name" id="name" class="form-control" placeholder="spaghetti"
                    aria-describedby="helpId" value="{{ old('name') }}">
            </div>

            {{-- ./name --}}


            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea required name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>

            {{-- .-description --}}


            <div class="mb-3">
                <label for="price" class="form-label">price</label>
                <input required type="number" name="price" id="price" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ old('price') }}">
            </div>


            {{-- ./price --}}

            {{-- TODO: fix the old function on radio button --}}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value='1' name="best_seller" id="best_seller">
                <label class="form-check-label" for="best_seller">
                    Best Seller
                </label>
            </div>


            {{-- ./best seller --}}


            <div class="form-check">
                <input class="form-check-input" type="checkbox" value='1' name="visible" id="visible" checked>
                <label class="form-check-label" for="visible">
                    available
                </label>
            </div>

            {{-- ./visible --}}


            <div class="mb-3">
                <label for="cover_image" class="form-label">cover image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control"
                    placeholder="add cover image " aria-describedby="helpId">
            </div>


            {{-- ./cover image --}}


            <button type="submit">add plate</button>



        </div>
    </form>
@endsection
