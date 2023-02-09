@extends('layouts.admin')
@section('content')
    <div class="container">
        <a class="btn btn-primary" href="{{ route('admin.plates.index') }}" role="button"><i
            class="fas fa-angle-left fa-fw"></i></a>
        <div class="title">
            <h1><span class="text-uppercase">name: </span>{{ $plate->name }}</h1>
        </div>
        <div class="image m-3">
            @if ($plate->cover_image)
                <img width="500" src="{{ asset('storage/' . $plate->cover_image) }}" alt="">
            @else
                <div class="placeholder-glow p-5 bg-danger">
                    placeholder
                </div>
            @endif
        </div>
        <p><span class="text-uppercase">description: </span>{{ $plate->description }}</p>
        <div>
            @if ($plate->best_seller)
                <p>il piatto e' tra i piu' richiesti</p>
            @else
                <p>il piatto non e' tra i piu' richiesti</p>
            @endif
        </div>
        <div>
            @if ($plate->visible)
                <p>il piatto e' disponibile</p>
            @else
                <p>il piatto non e' disponibile</p>
            @endif
        </div>
        <div>
            <h6>Category: {{ $plate->category ? $plate->category->name : 'Uncategorized' }}</h6>
        </div>
    </div>
@endsection
