@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>All Event</h1>
        <a class="btn btn-primary " href="/home">Go to Home</a>
        <br><br>
        <table class="table table-hover">
            <tr>
                <td>No ID</td>
                <td>Image</td>
                <td>Club</td>
                <td>Title</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            @foreach ($event as $e)
                <tr>
                    <td>{{ $e->id }}</td>
                    <td><img src="{{ asset('storage/' . $e->file_path) }}" alt="Event image"></td>
                    {{-- <td>{{ $e->file_path }}</td> --}}
                    <td>{{ $e->club->name }}</td>
                    <td>{{ $e->title }}</td>
                    <td>{{ $e->description }}</td>
                    {{-- Bawah ni untuk admin delete mana event x patuh peraturan --}}
                    <td>
                        <form action="/AdminManage/event/{{ $e->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
{{-- Masih process untuk tunjuk event all club --}}
