@extends('admin.layouts.master')

@section('title', 'Kosár megtekintés')

@section('head')
    @vite('resources/css/admin/orders.css')
@endsection

@section('content')
    <h1 class="title">Kosár megtekintés</h1>
    <div class="admin">
        <div class="cart-info">
            <h2>Felhasználó: {{$cart->user->email}}</h2>
            <h2>Összesen: {{$cart->totalPrice()}} Ft</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Termék</th>
                    <th>Mennyiség</th>
                    <th>Ár</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $product)
                    <tr>
                        <td>{{$product->product->id}}</td>
                        <td>{{$product->product->title}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}} Ft</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
