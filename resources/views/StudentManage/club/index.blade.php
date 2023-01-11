@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Club Index</h1>

        <a class="btn btn-primary " href="/home">Go to Home</a>

        <table class="table table-hover">
            <tr>
                <td>No Club ID</td>
                <td>Nama Club</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            {{-- mana dapat $user ???? dapat dari controller --}}
            @foreach ($club as $e)
                <tr>
                    <td>{{ $e->id }}</td>
                    <td>{{ $e->name }}</td>
                    <td>{{ $e->description }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/StudentManage/club/index_Event/{{ $e->id }}" class="btn btn-success">View</a>
                            {{-- <a href="/StudentManage/club/createjoinclub/{{ $e->id }}" class="btn btn-primary">Join</a> --}}

                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

{{-- ni dah x pakai --}}
