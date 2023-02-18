@extends('layouts.admin')
@section('content')
<div class="background_edit">
    <a class="btn btn-primary btn_back ms-3 mt-3" href="{{ route('admin.plates.index') }}" role="button"><i class="fas fa-angle-left fa-fw"></i><span class="mx-2">BACK</span></a>
    <form action="{{ route('admin.plates.update', $plate->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <!-- <a class="my_btn " href="{{ route('admin.plates.index') }}" role="button"><i class="fas fa-angle-left fa-fw"></i></a> -->
            <h1 class="text-uppercase text-center mt-3">edit plate</h1>
            @include('partials.errors')
            <div class="mb-3">
                <label for="name" class="form-label">plate's name *</label>
                <input type="text" required minlength="3" maxlength="100" name="name" id="name" class="form-control" placeholder="spaghetti" aria-describedby="helpId" value="{{ $plate->name }}">
            </div>

            {{-- ./name --}}


            <div class="mb-3">
                <label for="description" class="form-label">description *</label>
                <textarea name="description" required minlength="3" maxlength="1000" class="form-control" id="description" cols="30" rows="10">{{ $plate->description }}</textarea>
            </div>

            {{-- .-description --}}


            <div class="mb-3">
                <label for="price" class="form-label">price *</label>
                <input type="number" step="0.01" required min="0.3" max="999.99" name="price" id="price" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $plate->price }}">
            </div>


            {{-- ./price --}}

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value=1 name="best_seller" id="best_seller" {{ old('best_seller') || $plate['best_seller'] == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="best_seller">
                    click here if you want to highlight your plate
                </label>
            </div>


            {{-- ./best seller --}}


            <div class="form-check">
                <input class="form-check-input" type="checkbox" value=1 name="visible" id="visible" {{ old('visible') || $plate['visible'] == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="visible">
                    click here if the plate is available
                </label>
            </div>

            {{-- ./visible --}}
            <label class="mt-3" for="cover_image">change cover image</label>
            <div class="mb-3 d-flex">
                <img width="200" src="{{ asset('storage/' . $plate->cover_image) }}" alt="">
                <input type="file" max="5000" name="cover_image" id="cover_image" class="form-control" placeholder="add cover image " aria-describedby="helpId">
            </div>


            {{-- ./cover image --}}

            <div class="mb-3">
                <label for="category_id" class="form-label">Select category</label>
                <select class="form-select form-select-lg @error('category_id') is-invalid @enderror" name="category_id" id="category_id">

                    @forelse($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $plate->category ? $plate->category->id : '') ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @empty
                    <option value="">Sorry, no categories in the system.</option>
                    @endforelse
                </select>
            </div>

            <p>* Required fields</p>

            <!-- <button class="my_btn" type="submit">edit plate</button> -->
            <button class="btn btn_edit my-3 text-uppercase" type="submit"><span class="me-3">edit plate</span><i class="fa-solid fa-pen-to-square"></i></button>
        </div>
    </form>
</div>


<style>
    .background_edit {
        background-image: url('/img/sfondo.jpeg');
        background-size: cover
    }

    form {
        padding: 10rem 0;

    }

    .container {
        background-color: #ff9e45;
        padding: 1rem;
        border-radius: 2rem;
        color: black;
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

    .btn_edit {
        background-color: #f1f1f1;
        color: #f5612c;
        font-family: 'Unbounded', cursive;
        border: none;
        transition: 1s;
    }

    .btn_edit:hover {
        background-color: #f5612c;
        color: #f1f1f1;
        border: none;
    }
</style>
@endsection