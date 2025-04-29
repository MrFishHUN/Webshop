@extends('admin.layouts.master')

@section('title', 'Új kupon létrehozás')
@section('head')
    @vite('resources/css/admin/discount.css')
@endsection

@section('content')
    <h1 class="title">Új kupon létrehozás</h1>
    <div class="admin centering">
        <div class="modify">
            <form action="{{route('coupons.store')}}" method="POST">
                @csrf
                <label for="percentage">Kedvezmény %:</label>
                <input type="number" name="percentage" id="percentage" value="{{old('percentage')}}}" class=" @error('percentage') form-error @enderror">
                @error('percentage')
                <p class="form-message-error">
                    {{ $message }}
                </p>
                @enderror
                <label for="starts_at">Kezdő időpont:</label>
                <input type="date" name="starts_at" id="starts_at" class="@error('starts_at') form-error @enderror">
                @error('starts_at')
                    <p class="form-message-error">
                        {{ $message }}
                    </p>
                @enderror
                <label for="ends_at">Befejező időpont:</label>
                <input type="date" name="ends_at" id="ends_at" class="@error('ends_at') form-error @enderror">
                @error('ends_at')
                <p class="form-message-error">
                    {{ $message }}
                </p>
                @enderror
                <button type="submit" class="btn-edit btn">Mentés</button>
                <a href="{{route('discounts.index')}}" class="btn btn-delete">Mégsem</a>
            </form>
        </div>
    </div>
@endsection
