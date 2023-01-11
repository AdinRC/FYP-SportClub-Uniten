@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Event Index</h1>

        <a class="btn btn-primary " href="/EditorManage/event">Go to Club</a>
        {{-- <a class="btn btn-success " href="/EditorManage/event/create">Add event</a><br> --}}

        <table class="table table-hover">
            <tr>
                <td>No ID</td>
                <td>Image</td>
                <td>Club</td>
                <td>Title</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            {{-- mana dapat $user ???? dapat dari controller --}}
            @foreach ($event as $e)
                <tr>
                    <td>{{ $e->id }}</td>
                    <td><img src="{{ asset('storage/' . $e->file_path) }}" alt="Your image"> </td>
                    {{-- <td><img src="{{ asset('storage/' . $e->file_path) }}" alt="Event image"></td> --}}
                    {{-- <td>{{ $e->file_path }}</td> --}}
                    {{--  atas ni untuk check dia punya file kat mana --}}
                    <td>{{ $e->club->name }}</td>
                    <td>{{ $e->title }}</td>
                    <td>{{ $e->description }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/EditorManage/event/{{ $e->id }}/edit" class="btn btn-warning">Edit</a>
                            <form action="/EditorManage/event/{{ $e->id }}" method="POST">
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
