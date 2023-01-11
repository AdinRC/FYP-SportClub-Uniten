@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Student Index</h1>

        <a class="btn btn-primary " href="/home">Go to Home</a>
        <a class="btn btn-success " href="/AdminManage/student/create">Add student</a><br>

        <table class="table table-hover">
            <tr>
                <td>No ID</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Role</td>
                <td>Action</td>
            </tr>
            {{-- mana dapat $user ???? dapat dari controller --}}
            @foreach ($user as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->role }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/AdminManage/student/{{ $student->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/AdminManage/student/{{ $student->id }}" method="POST">
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
