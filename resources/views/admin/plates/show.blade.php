@extends('layouts.admin')

@section('content')
<div class="background">
    <div class="container">
        <!-- card plate -->
        <div class="card">
            <h3 class="p-2">{{ $plate->name }}</h3>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col">
                    <div class="image m-3">
                        @if ($plate->cover_image)
                        <img width="500" src="{{ asset('storage/' . $plate->cover_image) }}" alt="">
                        @else
                        <div class="placeholder-glow p-5">placeholder</div>
                        @endif
                    </div>
                </div>
                <div class="col mt-5">
                    <div>
                        @if ($plate->best_seller)
                        <p class="best-seller">il piatto e' tra i piu' richiesti</p>
                        @endif
                        @if ($plate->visible)
                        <p class="visible">il piatto e' disponibile</p>
                        @else
                        <p class="not-visible">il piatto non e' disponibile</p>
                        @endif
                    </div>
                    <div>
                        <p class="category mb-5">Categoria: {{ $plate->category ? $plate->category->name : 'Uncategorized' }}</p>

                    </div>
                    <p class="mb-1">{{ $plate->description }}</p>
                    <p>{{ $plate->price }} €</p>


                </div>
            </div>
            <!-- btn -->
            <div>
                <button class="btn btn_back ms-3 mb-3 mt-3 text-uppercase" type="submit">
                    <a href="{{ route('admin.plates.index') }}" role="button"><i class="fas fa-angle-left fa-fw"></i><span class="mx-2">BACK</span></a>
                </button>
                <button class="btn btn_edit ms-2 mb-3 mt-3 text-uppercase" type="submit">
                    <a href="{{ route('admin.plates.edit', $plate->slug) }}" role="button"><span class="me-3">edit plate</span><i class="fa-solid fa-pen-to-square"></i></a>

                </button>

                <!--  <button class="my_btn m-3">
                    <a class="my_btn " href="{{ route('admin.plates.index') }}" role="button"><i class="fas fa-angle-left fa-fw"></i>back</a>
                </button> 
                <button class="my_btn m-3">
                    <a href="{{ route('admin.plates.edit', $plate->slug) }}">edit
                        plate</a>
                </button>-->
            </div>
        </div>
    </div>
</div>
<style scoped lang="scss">
    .container {
        font-family: "Unbounded", cursive;
    }

    h3 {
        text-align: center;
        background-color: #f5612c;
        color: #f1f1f1;
        border-top-right-radius: 0.5rem;
        border-top-left-radius: 0.5rem;
    }

    .card {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 40%;
        transform: translate(-50%, -50%);
        background-color: #f1f1f1;
        box-shadow: 1rem 1rem #ff9e45;
        border: none;
    }

    img {
        width: 200px;
    }

    /*     button {
        width: 200px
    } */

    .best-seller,
    .visible,
    .not-visible {
        font-weight: bold;
        margin-bottom: 0.25rem;
    }

    .category {
        font-weight: bold;
        color: #5a5a5a;
    }

    .visible {
        color: green
    }

    .not-visible {
        color: red
    }

    .placeholder-glow {
        background-color: #ff9e45;
        opacity: 60%;
        height: 100%;
        aspect-ratio: 1/1;
        display: flex;
        text-align: center;
        align-items: center;
    }

    .position_absolute {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-transform: uppercase;
    }

    .header {
        position: absolute;
        top: 0;
        width: 100%;
    }

    /*  .col-6,
    h6 {
        font-size: 30px
    } */

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
        font-family: 'Unbounded', cursive;
    }

    .btn_edit {
        background-color: #f5612c;
        color: #f1f1f1;
        font-family: 'Unbounded', cursive;
        border: none;
        transition: 1s;
    }

    .btn_edit:hover {
        background-color: #ff9e45;
        border: none;

    }

    a {
        text-decoration: none;
        color: #f1f1f1;
        transition: 1s;
    }

    .btn_back a:hover {
        color: #0086A8;
    }

    .btn_edit a:hover {
        color: #f5612c;
    }
</style>
@endsection