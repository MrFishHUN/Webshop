@extends('admin.layouts.master')
@section('title', 'Felhasználók')
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
        Felhasználók
    </h1>
    <div class="search">
        <form action="{{route('users.index')}}" method="GET">
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
                    <th>Regisztráció dátuma</th>
                    <th>Utolsó bejelentkezés</th>
                    <th>Aktívált Email</th>
                    <th>Művelet</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->last_login}}</td>
                        <td>
                            @if($user->email_verified_at)
                                Igen
                            @else
                                Nem
                            @endif
                        <td class="flex flex-row">
                            <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-delete"><i class="bi bi-trash3-fill"></i></button>
                            </form>

                            <form action="{{route('users.sendPasswordResetEmail',$user)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-add"><i class="bi bi-envelope-fill"></i></button>
                            </form>

                            <form>
                                <a href="{{route('users.editEmail',$user->id)}}" class="btn btn-edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{$users->links('pagination::default')}}
    </div>
@endsection
