@extends('layouts.app')

@section('content')
<section class="product-detail">
    <img src="{{ asset('img/istockphoto-1147544807-612x612.jpg') }}" alt="{{ $product->title }}">
    <div class="product-info">
        <h1>{{ $product->title }}</h1>
        <p class="price">{{ $product->price }} Ft</p>
        <p class="description">{{$product->description}}</p>
        <button class="button-add">Kosárba</button>
    </div>
</section>
@endsection
