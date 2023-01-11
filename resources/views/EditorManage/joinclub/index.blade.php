@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Student Club Index</h1>

        <a class="btn btn-primary " href="/home">Go to Home</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No ID</th>
                    <th>Username</th>
                    <th>Club</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($pending as $membership)
                    <tr>
                        <td>{{ $membership->user->id }}</td>
                        <td>{{ $membership->user->name }}</td>
                        <td>{{ $membership->club->name }}</td>
                        <td>{{ $membership->status }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{--  --}}
                                @if ($membership->status == '1')
                                    <button class="btn btn-primary" disabled>Your already accept it</button>
                                @elseif ($membership->status == '2')
                                    <button class="btn btn-danger" disabled>You reject it</button>
                                @else
                                    <form method="POST" action="/EditorManage/joinclub/index/{{ $membership->id }}/accept">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Accept</button>
                                    </form>
                                    <form method="POST" action="/EditorManage/joinclub/index/{{ $membership->id }}/reject">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Reject</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
