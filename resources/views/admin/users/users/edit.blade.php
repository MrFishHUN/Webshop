@extends('admin.layouts.master')
@section('title', 'Felhasználó módosítás')


@section('content')
    <h1 class="title">
        Felhasználó módosítás
    </h1>
    <div class="admin centering">
        <div class="modify">
            <form action="{{route('users.update',$user)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{$user->email}}" class="@error('email') error @enderror">
                @error('email')
                <p class="form-message-error">
                    {{ $message }}
                </p>
                @enderror

                <button type="submit" class="btn-add btn">Mentés</button>
                <a href="{{route('users.index')}}" class="btn btn-delete">Mégsem</a>
            </form>
        </div>
    </div>
@endsection
