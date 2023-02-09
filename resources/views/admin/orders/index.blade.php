@extends('layouts.admin')
@section('content')
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Delivery Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Plates Name</th>
                    <th scope="col">Ordering Time</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($order_array as $order)
                    <tr class="">
                        <td scope="row">{{ $order->customer_name }}</td>
                        <td>{{ $order->price . '€' }}</td>
                        <td>{{ $order->delivery_address }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td>
                            @forelse ($order->plates as $singleplate)
                                {{ $singleplate->name }}{{ $singleplate->price . '€' . ' | ' }}
                            @empty
                                no plate to show
                            @endforelse
                        </td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td>no orders</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
