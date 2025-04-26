@extends('admin.layouts.master')
@section('title', 'Kedvezmények')
@section('head')
    @vite('resources/css/admin/discount.css')
@endsection
@section('content')
    <h1 class="title">Kedvezmények</h1>
    <form action="{{route('discount.search')}}" method="get">
        <div class="search">
            <input type="text" name="search" id="search" placeholder="Keresés" value="{{request('search')}}">
            <button type="submit"><i class="bi bi-search"></i></button>
        </div>
    </form>
    <div class="admin">
        <div>
            <h1>Akciós termékek</h1>
            <table>
                <thead>
                <tr>
                    <th>*</th>
                    <th>Termék név</th>
                    <th>Akciós ár</th>
                    <th>Kezdvezmény %</th>
                    <th>Kategória</th>
                    <th>Létrehozva</th>
                    <th>Érévényes</th>
                    <th>Műveletek</th>
                </tr>
                </thead>
                <tbody>
                @foreach($discounts as $discount)
                    <tr>
                        <td>{{$discount->product_id}}</td>
                        <td>{{$discount->product->title}}</td>
                        <td>
                            @if($discount->product->discount)
                                <span class="old-price">{{$discount->product->price}} Ft</span>
                                <span class="off"><span>{{$discount->percentage}}%</span><i class="bi bi-arrow-right"></i></span>
                                <span class="new-price">{{round($discount->product->price - ($discount->product->price * $discount->percentage / 100))}} Ft</span>
                            @else
                                {{$discount->product->price}} Ft
                            @endif
                        </td>
                        <td>{{$discount->percentage}}%</td>
                        <td>
                            @if($discount->product->category)
                                {{$discount->product->category->name}}
                            @else
                                Nincs kategória
                            @endif
                        </td>
                        <td>{{$discount->starts_at}}</td>
                        <td>
                            @if($discount->ends_at)
                                {{$discount->ends_at}}
                            @else
                                Nincs megadva
                            @endif
                        </td>
                        <td>
                            <form action="{{route('discounts.destroy',$discount)}}" method="POST">
                                <a href="{{route('discounts.edit',$discount->product_id)}}" class="btn btn-edit"><i class="bi bi-pencil-square"></i></a>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-delete"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="addDiv">
                <a href="{{route('discounts.create')}}" class="btn btn-add">Új kedvezmény létrehozás <i class="bi bi-plus-square"></i></a>
            </div>
        </div>
        <div>
            <h1>Kuponok</h1>
            <table><thead>
                <tr>
                    <th>*</th>
                    <th>Kód</th>
                    <th>Kezdvezmény %</th>
                    <th>Indul(t)</th>
                    <th>Végetér</th>
                    <th>Műveletek</th>
                </tr>
                </thead>
                <tbody>
                @foreach($coupons as $coupon)
                    <tr>
                        <td>{{$coupon->id}}</td>
                        <td>{{$coupon->code}}</td>
                        <td>{{$coupon->percentage}}%</td>
                        <td>{{$coupon->starts_at}}</td>
                        <td>
                            @if($coupon->ends_at)
                                {{$coupon->ends_at}}
                            @else
                                Nincs megadva
                            @endif
                        </td>
                        <td>
                            <form action="{{route('coupons.destroy',$coupon)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-delete"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="addDiv">
                <a href="{{route('coupons.create')}}" class="btn btn-add">Új kupon létrehozás <i class="bi bi-plus-square"></i></a>
            </div>
        </div>
        {{$discounts->links('vendor.pagination.default')}}
    </div>
@endsection
