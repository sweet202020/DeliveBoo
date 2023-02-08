@extends('layouts.admin')
@section('content')
    @foreach ($orders as $order)
    @foreach ($order->plates as $singlePlate)
     @if($singlePlate['restaurant_id'] == Auth::id())
        <h1>{{$order->customer_name}}</h1>
        <h1>{{$singlePlate->name}}</h1>
        @endif
    @endforeach
  
    {{-- @if($order->plates->restaurant_id == Auth::id())
        <h1>{{$order}}</h1>
        @endif --}}
    @endforeach
@endsection
