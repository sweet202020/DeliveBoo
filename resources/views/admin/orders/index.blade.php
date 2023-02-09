@extends('layouts.admin')
@section('content')
@foreach ($ordini as $order)
    <h1>{{$order->customer_name}}</h1>
    @foreach ($order->plates as $singleplate )
        <h1>{{$singleplate->name}}</h1>
    @endforeach
    @endforeach
@endsection
