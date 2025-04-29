@extends('admin.layouts.master')

@section('title','Kedvezmény létrehozás')
@section('head')
    @vite('resources/css/admin/discount.css')
@endsection
@section('content')
    <h1 class="title">
        Kedvezmény létrehozás
    </h1>
    <div class="admin centering">
        <div class="modify">
            <form action="{{route('discounts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="product_id">Termék azonosítója:</label>
                <input type="number" name="product_id" id="product_id" value="{{old('product_id')}}" class="@error('product_id') form-error @enderror">
                @error('product_id')
                <p class="form-message-error">
                    {{ $message }}
                </p>
                @enderror
                <label for="percentage">Kedvezmény mértéke (%):</label>
                <input type="number" name="percentage" id="percentage" value="{{old('percentage')}}" class="@error('percentage') form-error @enderror">
                @error('percentage')
                <p class="form-message-error">
                    {{ $message }}
                </p>
                @enderror
                <label for="start_date">Kezdő dátum:</label>
                <input type="date" name="starts_at" id="starts_date" value="{{old('starts_at')}}" class="@error('starts_at') form-error @enderror">
                @error('starts_at')
                    <p class="form-message-error">
                        {{ $message }}
                    </p>
                @enderror
                <label for="ends_at">Befejező dátum:</label>
                <input type="date" name="ends_at" id="ends_at" value="{{old('ends_at')}}" class="@error('ends_at') form-error @enderror">
                @error('ends_at')
                <p class="form-message-error">
                    {{ $message }}
                </p>
                @enderror

                <button type="submit" class="btn-add btn">Hozzáadás</button>
                <a href="{{route('discounts.index')}}" class="btn btn-delete">Mégsem</a>
            </form>
        </div>
    </div>
@endsection
