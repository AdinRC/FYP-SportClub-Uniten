@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Club Index</h1>

        <a class="btn btn-primary " href="/home">Go to Home</a>
        <a class="btn btn-success " href="/AdminManage/club/create">Add Club</a><br>

        <table class="table table-hover">
            <tr>
                <td>No ID</td>
                <td>Club Name</td>
                <td>Description</td>
                <td>Uniten Club and Societies Administrator Name</td>
                <td>Action</td>
            </tr>
            {{-- mana dapat $user ???? dapat dari controller --}}
            @foreach ($club as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->description }}</td>
                    <td>{{ $c->User->name }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/AdminManage/club/{{ $c->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/AdminManage/club/{{ $c->id }}" method="POST">
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
