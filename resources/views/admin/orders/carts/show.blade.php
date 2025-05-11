@extends('admin.layouts.master')

@section('title', 'Kosár megtekintés')

@section('head')
    @vite('resources/css/admin/orders.css')
@endsection

@section('content')
    <h1 class="title">Kosár megtekintés</h1>
    <div class="admin">
        <div class="cart-info">
            <h2>Összesen: {{$cart}} Ft</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Termék</th>
                    <th>Mennyiség</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart->items as $product)
                    <tr>
                        <td>{{$product->product->id}}</td>
                        <td>{{$product->product->title}}</td>
                        <td>{{$product->quantity}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="cart-actions">
            <br>
            <form action="{{route('carts.destroy', $cart)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete">Kosár törlése</button>
            </form>
            <br>
            <form action="{{route('orders.store')}}" method="POST">
                @csrf
                <input type="hidden" name="cart_id" value="{{$cart->id}}">
                <button type="submit" class="btn btn-add">Rendelés leadása</button>
            </form>
        </div>
    </div>
@endsection
