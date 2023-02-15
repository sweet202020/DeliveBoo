@extends('layouts.admin')
@section('content')
<a class="btn btn-primary btn_back ms-3 mt-3" href="{{ route('admin.plates.index') }}" role="button"><i class="fas fa-angle-left fa-fw"></i><span class="mx-2">BACK</span></a>
<form action="{{ route('admin.plates.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <h1 class="text-uppercase text-center mt-3">add plate</h1>
        @include('partials.errors')
        <div class="mb-3">
            <label for="name" class="form-label">plate's name *</label>
            <input required minlength="3" maxlength="100" type="text" name="name" id="name" class="form-control" placeholder="pizza margherita" aria-describedby="helpId" value="{{ old('name') }}">
        </div>

        {{-- ./name --}}


        <div class="mb-3">
            <label for="description" class="form-label">description *</label>
            <textarea required minlength="3" maxlength="1000" name="description" class="form-control" id="description" cols="30" rows="10" placeholder="tomato sauce, mozzarella cheese">{{ old('description') }}</textarea>
        </div>

        {{-- .-description --}}


        <div class="mb-3">
            <label for="price" class="form-label">price *</label>
            <input required type="number" step="0.01" min="0" max="999.99" name="price" id="price" class="form-control" placeholder="1" aria-describedby="helpId" value="{{ old('price') }}">
        </div>


        {{-- ./price --}}

        {{-- TODO: fix the old function on radio button --}}
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value=1 {{ old('best_seller') ? 'checked' : '' }} name="best_seller" id="best_seller">
            <label class="form-check-label" for="best_seller">
                click here if you want to highlight your plate
            </label>
        </div>


        {{-- ./best seller --}}


        <div class="form-check">
            <input class="form-check-input" type="checkbox" value=1 name="visible" id="visible" {{ old('visible') ? 'checked' : '' }}>
            <label class="form-check-label" for="visible">
                click here if the plate is available
            </label>
        </div>

        {{-- ./visible --}}


        <div class="mb-3">
            <label for="cover_image" class="form-label">cover image</label>
            <input type="file" max="5000" name="cover_image" id="cover_image" class="form-control" placeholder="add cover image " aria-describedby="helpId">
        </div>

        {{-- ./cover image --}}

        <div class="mb-3">
            <label for="category_id" class="form-label">category</label>
            <select class="form-select form-select-lg @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option selected value=''>Select one</option>
                @forelse ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @empty
                <h6>Sorry.No categories inside the database yet.</h6>
                @endforelse
            </select>
        </div>

        <p>* Required fields</p>
        <button class="btn btn-warning btn_add my-3 text-uppercase" type="submit"><span class="me-3">ADD PLATE</span><i class="fa-regular fa-square-plus"></i></button>




    </div>
</form>
<style>
    form {
        padding: 10rem 0;
        background-image: url('/img/sfondo.jpeg');
        background-size: cover
    }

    .container {
        background-color: #ff9e45;
        padding: 1rem;
        border-radius: 2rem
    }

    /*** BTN SECTION ***/

    .btn_back {
        background-color: #0086A8;
        color: #f1f1f1;
        border: none;
        font-family: 'Unbounded', cursive;
        cursor: pointer;
        transition: 1s;
    }

    .btn_back:hover {
        background-color: #2CCCF5;
        color: #0086A8;
        font-family: 'Unbounded', cursive;
    }

    .btn_add {
        background-color: #f1f1f1;
        color: #f5612c;
        font-family: 'Unbounded', cursive;
        border: none;
        transition: 1s;
    }

    .btn_add:hover {
        background-color: #f5612c;
        color: #f1f1f1;
        border: none;
    }
</style>
@endsection