@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Uniten Club and Societies Administrator Index</h1>

        <a class="btn btn-primary " href="/home">Go to Home</a>
        <a class="btn btn-success " href="/AdminManage/editor/create">Add Uniten Club and Societies Administrator</a><br>

        <table class="table table-hover">
            <tr>
                <td>No ID</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Role</td>
                <td>Action</td>
            </tr>
            {{-- mana dapat $user ???? dapat dari controller --}}
            @foreach ($user as $editor)
                <tr>
                    <td>{{ $editor->id }}</td>
                    <td>{{ $editor->name }}</td>
                    <td>{{ $editor->email }}</td>
                    <td>{{ $editor->role }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/AdminManage/editor/{{ $editor->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/AdminManage/editor/{{ $editor->id }}" method="POST">
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
