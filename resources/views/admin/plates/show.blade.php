@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="title">
            <h1>{{ $plate->name }}</h1>
        </div>
        <div class="image">
            @if ($plate->cover_image)
                <img src="{{ asset('storage/' . $plate->cover_image) }}" alt="">
            @else
                <div class="placeholder-glow p-5 bg-danger">
                    placeholder
                </div>
            @endif
        </div>
        <p>{{ $plate->description }}</p>
        <div>
            @if ($plate->best_seller)
                <p>il piatto e' tra i piu' richiesti</p>
            @else
                <p>il piatto non e' tra i piu' richiesti</p>
            @endif
        </div>
        @if ($plate->visible)
            <p>il piatto e' disponibile</p>
        @else
            <p>il piatto non e' disponibile</p>
        @endif
    </div>
@endsection
