@extends('admin.layouts.master')

@section('title', 'Kosarak lista')

@section('head')
    @vite('resources/css/admin/orders.css')
@endsection

@section('content')
    <h1 class="title">Kosarak lista</h1>
    <div class="admin">
            <table>
                <thead>
                    <tr>
                        <th>Azonosító</th>
                        <th>Felhasználó</th>
                        <th>Összeg</th>
                        <th>Létrehozva</th>
                        <th>Művelet</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <td>{{$cart->id}}</td>
                            <td>{{$cart->user->email}}</td>
                            <td>{{$cart->cart->totalPrice()}} Ft</td>
                            <td>{{$cart->created_at}}</td>
                            <td><a href="{{route('carts.show',$cart)}}" class="btn btn-add">Megtekintés</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
@endsection
