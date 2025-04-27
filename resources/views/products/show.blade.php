@extends('layouts.app')

@section('content')
<section class="product-detail mt-20">
    <img src="{{asset("storage/".$product->picture)  }}" alt="{{ $product->title }}">
    <div class="product-info">
        <h1>{{ $product->title }}</h1>
        <p class="price">{{ $product->price }} Ft</p>
        <p class="description">{{$product->description}}</p>
        <button class="button-add">Kosárba</button>
    </div>
</section>
@endsection
