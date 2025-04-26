@extends('admin.layouts.master')
@section('title', 'Termékek')
@section('head')
    @vite('resources/css/admin/products.css')
@endsection
@section('content')
    <a href="{{route('products.create')}}" class="btn btn-add addProduct">Termék hozzáadása <i class="bi bi-plus-square-fill"></i></a>
<h1 class="title">Termékek</h1>
    <div class="admin">
        <form action="{{route('products.search')}}" method="get">
            <div class="search">
                <input type="text" name="search" id="search" placeholder="Keresés" value="{{request('search')}}">
                <button type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>
        <table>
            <thead>
            <tr>
                <th>Azonosító</th>
                <th>Név</th>
                <th>Ár</th>
                <th>Kategória</th>
                <th>Raktáron</th>
                <th>Mennyíség</th>
                <th>Létrehozva</th>
                <th>Módosítva</th>
                <th>Látható</th>
                <th>Műveletek</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>
                        @if($product->discount)
                            <span class="old-price">{{$product->price}} Ft</span>
                            <span class="off"><span>{{$product->discount->percentage}}%</span><i class="bi bi-arrow-right"></i></span>
                            <span class="new-price">{{round($product->price - ($product->price * $product->discount->percentage / 100))}} Ft</span>
                        @else
                            {{$product->price}} Ft
                        @endif
                    </td>
                    <td>
                        @if($product->category)
                            {{$product->category->name}}
                        @else
                            Nincs kategória
                        @endif
                    </td>
                    <td>
                        @if($product->in_stock)
                            Igen
                        @else
                            Nem
                        @endif
                    </td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td>
                        @if($product->visible)
                            Igen
                        @else
                            Nem
                        @endif
                    </td>
                    <td>
                        <form action="{{route('products.destroy',$product->id)}}" method="POST">
                            <a href="{{route('products.edit',$product)}}" class="btn btn-edit"><i class="bi bi-pencil-square"></i></a>
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-delete"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{ $products->links('pagination::default') }}
        </div>
    </div>
@endsection
