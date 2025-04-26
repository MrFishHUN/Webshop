@extends('admin.layouts.master')

@section('head')
    @vite('resources/css/admin/category.css')
    <style>
        .table-scroll {
            max-height: 300px;
            overflow-y: auto;
            display: block;
        }

        thead {
            background-color: var(--dark-blue);
            color: white;
            position: sticky;
            top: 0;
            z-index: 1;
        }
    </style>
@endsection

@section('title', 'Kategóriák')

@section('content')
    <h1 class="title">Kategóriák</h1>
    <div class="admin centering">
        <div class="modify">
            <form action="{{route('categories.update',$selected)}}" method="POST">
                @csrf
                @method('PUT')
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{$selected->name}}">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="{{$selected->description}}">
                <label for="parent_id">Hozzárendelt kategória:</label>
                <select name="parent_id" id="parent_id">
                    <option value="null">Hozzárendelés törlés</option>
                    @foreach($main_categories as $category)
                        @if($category->id == $selected->id)
                            @continue
                        @endif
                        @if($selected->parent_id == $category->id)
                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
                <button type="submit" class="btn-edit btn">Mentés</button>
                <a href="{{route('categories.index')}}" class="btn btn-delete">Mégsem</a>
            </form>
        </div>
    </div>
@endsection
