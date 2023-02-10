@extends('layouts.admin')
<div class="background"></div>
@section('content')
    <div class="container">
        <div class="card">
            <h1 class="">{{ $plate->name }}</h1>
            <div class="row">


                <div class="col-6">
                    @if ($plate->cover_image)
                        <img width="500" src="{{ asset('storage/' . $plate->cover_image) }}" alt="">
                    @else
                        <div class="placeholder-glow position-relative">
                            <div class="position-absolute">
                                placeholder
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-6 mt-5">
                    <p>{{ $plate->description }}</p>
                    <div>
                        @if ($plate->best_seller)
                            <p class="best-seller">il piatto e' tra i piu' richiesti</p>
                        @endif
                        @if ($plate->visible)
                            <p class="visible">il piatto e' disponibile</p>
                        @else
                            <p class="not-visible">il piatto non e' disponibile</p>
                        @endif
                        <div>
                            <h6>Category: {{ $plate->category ? $plate->category->name : 'Uncategorized' }}</h6>
                        </div>
                    </div>

                </div>
            </div>
            <button class="btn btn-primary mt-3">
                <a class="text-white" href="{{ route('admin.plates.edit', $plate->slug) }}">edit
                    plate</a>
            </button>
            <button class="btn btn-primary mt-3">
                <a class="text-white" href="{{ route('admin.plates.index', $plate->slug) }}">go back</a>
            </button>
        </div>
    </div>
    <style scoped lang="scss">
        .container {
            font-family: "Unbounded", cursive;
        }

        h1 {
            text-align: center;
            background-color: #f5612c
        }

        .card {
            position: absolute;
            background-color: #f5612c;
            box-shadow: 1rem 1rem black;
            width: 65%;
            top: 50%;
            transform: translate(0, -50%);
            background-color: #f5612c;
            box-shadow: 1rem 1rem black
        }


        button {
            width: 100px
        }

        .best-seller,
        .visible,
        .not-visible {
            font-weight: bold
        }

        .visible {
            color: green
        }

        .not-visible {
            color: red
        }

        .placeholder-glow {
            background-color: rgb(107, 190, 107);
            height: 100%;
            text-align: center;
        }

        .position-absolute {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-transform: uppercase;
        }

        .col-6,
        h6 {
            font-size: 30px
        }
    </style>
@endsection
