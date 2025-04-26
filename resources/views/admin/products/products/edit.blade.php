@extends('admin.layouts.master')
@section('title', 'Termék hozzáadása')
@section('head')
    @vite('resources/css/admin/products.css')
@endsection
@section('content')
    <h1 class="title">Termék hozzáadás</h1>
    <div class="admin centering">
        <div class="modify">
            <form autocomplete="off" action="{{route('products.update',[$product])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="title">Név:</label>
                <input type="text" name="title" id="title" value="{{$product->title}}" class="@error('title') error @enderror">
                <label for="description">Leírás:</label>
                <textarea name="description" id="description" cols="70" rows="10" class="@error('description') error @enderror">{{$product->description}}</textarea>
                <label for="summary">Rövid leírás:</label>
                <input type="text" name="summary" id="summary" value="{{$product->summary}}" class="@error('summary') error @enderror">
                <label for="picture">Kép:</label>
                <input type="file" name="picture" id="picture" accept="image/*" class="@error('picture') error @enderror">
                <div class="split">
                    <div>
                        <label for="price">Ár:</label>
                        <input value="{{$product->price}}" type="number" name="price" id="price" class="@error('price') error @enderror">
                    </div>
                    <div>
                        <label for="quantity">Mennyiség:</label>
                        <input value="{{$product->quantity}}" type="number" name="quantity" id="quantity" class="@error('quantity') error @enderror">
                    </div>
                </div>
                <label for="category_id">Kategória:</label>
                <select name="category_id" id="category_id" class="@error('category_id') error @enderror">
                    @foreach($categories as $category)
                        @if($category->id == $product->category_id)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
                <div class="checkboxes">
                    <div>
                        <label for="in_stock">Raktáron:</label>
                        <input @if($product->in_stock) checked @endif type="checkbox" value="0" name="in_stock" id="in_stock" class="@error('in_stock') error @enderror">
                    </div>
                    <div>
                        <label for="visible">Látható:</label>
                        <input @if($product->in_stock) checked @endif type="checkbox" value="1" name="visible" id="visible" class="@error('visible') error @enderror">
                    </div>
                </div>
                <button type="submit" class="btn-add btn">Mentés</button>
                <a href="{{route('products.index')}}" class="btn btn-delete">Mégsem</a>
            </form>
        </div>
@endsection
