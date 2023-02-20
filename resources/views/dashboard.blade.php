@extends('layouts.admin')

@section('content')
    <div class="container pt-3">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <p class="card-header font_size">{{ __('Dashboard') }}</p>

                    <p class="card-body font_size">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
