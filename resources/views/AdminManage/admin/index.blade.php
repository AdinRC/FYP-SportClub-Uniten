@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Admin Index</h1>

        <a class="btn btn-primary " href="/home">Go to Home</a>
        <a class="btn btn-success " href="/AdminManage/admin/create">Add Admin</a><br>

        <table class="table table-hover">
            <tr>
                <td>No ID</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Role</td>
                <td>Action</td>
            </tr>
            {{-- mana dapat $user ???? dapat dari controller --}}
            @foreach ($user as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->role }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/AdminManage/admin/{{ $admin->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/AdminManage/admin/{{ $admin->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
