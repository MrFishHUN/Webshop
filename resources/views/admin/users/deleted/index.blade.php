@extends('admin.layouts.master')
@section('title', 'Törölt felhasználók')

@section('head')
    <style>
        .admin {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .search form{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        tbody tr:nth-child(even) {
            background-color: #a90000;
        }

    </style>
@endsection

@section('content')
    <h1 class="title">
        Törölt felhasználók
    </h1>
    <div class="search">
        <form action="{{route('users.trashed')}}" method="GET">
            <input type="text" name="search" id="search" placeholder="Keresés név vagy email alapján" value="{{request('search')}}">
            <button type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <div class="admin">
        <table>
            <thead>
            <tr>
                <th>Felhasználónév</th>
                <th>Email</th>
                <th>Törlés dátuma</th>
                <th>Művelet</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->deleted_at}}</td>
                    <td class="flex flex-row">
                        <form action="{{route('users.restore',$user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-add">Visszaállítás</button>
                        </form>

                        <form action="{{route('users.forceDelete',$user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Törlés véglegesen</button>
                        </form>

                    </td>

                </tr>

            @endforeach
            </tbody>
        </table>

    </div>
@endsection
