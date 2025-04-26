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
    <div class="admin">
        <div class="table-container">
            <h2>Fő kategóriák</h2>
            <div class="table-scroll">
                    <table>
                        <thead>
                        <tr>
                            <th>Azonósító</th>
                            <th>Név</th>
                            <th>Leírás</th>
                            <th>Módosítva</th>
                            <th>Létrehozva</th>
                            <th>Műveletek</th>
                        </tr>
                        </thead>
                       <tbody>
                       @foreach($main_categories as $category)
                           <tr>
                               <td>{{$category->id}}</td>
                               <td>{{$category->name}}</td>
                               <td>{{$category->description}}</td>
                               <td>{{$category->created}}</td>
                               <td>{{$category->updated}}</td>
                               <td class="action-row">
                                   <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                       <a href="{{route('categories.edit',$category->id)}}" class="btn btn-edit"><i class="bi bi-pencil-square"></i></a>
                                       @method('DELETE')
                                       @csrf
                                       <button type="submit" class="btn btn-delete"><i class="bi bi-trash3-fill"></i></button>
                                   </form>
                               </td>
                           </tr>
                       @endforeach
                       </tbody>
                    </table>

                </div>
            <h2>Alárendelt kategóriák</h2>
            <div class="table-scroll">
                <table>
                    <thead>
                    <tr>
                        <th>Azonósító</th>
                        <th>Név</th>
                        <th>Csatolva</th>
                        <th>Leírás</th>
                        <th>Módosítva</th>
                        <th>Létrehozva</th>
                        <th>Műveletek</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($alt_categories as $alt_category)
                            <tr>
                                <td>{{$alt_category->id}}</td>
                                <td>{{$alt_category->name}}</td>
                                <td>{{$alt_category->parent_name}}</td>
                                <td>{{$alt_category->description}}</td>
                                <td>{{$alt_category->created}}</td>
                                <td>{{$alt_category->updated}}</td>
                                <td class="action-row">
                                    <form action="{{route('categories.destroy',$alt_category->id)}}" method="POST">
                                        <a href="{{route('categories.edit',$alt_category->id)}}" class="btn btn-edit"><i class="bi bi-pencil-square"></i></a>
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-delete"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        <!--Add category and search-->
        <div class="form-container">
            <form autocomplete="off" action="{{route('categories.search')}}" method="POST">
                @csrf
                <h3>Keresés</h3>
                <input type="text" name="name" placeholder="Keresés">

                <button type="submit" class="btn btn-add margint-top-10">Keresés <i class="bi bi-search"></i></button>
            </form>

            <form autocomplete="off" action="{{route('categories.store')}}" method="POST">
                @csrf
                <h3>Kategória hozzáadás</h3>
                <input type="text" value="{{old('name')}}" class="@error('name') form-error @enderror" name="name" placeholder="Kategória neve*">
                <input type="text" value="{{old('description')}}" name="description" placeholder="Kategória leírása*" class="@error('description') form-error @enderror">
                <select name="parent_id" id="parent_id" class="@error('parent_id') form-error @enderror">
                    <option value="0" selected>Kategóriához hozzárendelés</option>
                    @foreach($main_categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-add margint-top-10">Hozzáadás <i class="bi bi-plus-square"></i></button>
            </form>
        </div>
    </div>
@endsection
