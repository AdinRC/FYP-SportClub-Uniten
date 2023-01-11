@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Permission Student to Join Event</h1>

        <a class="btn btn-primary " href="/home">Go to Home</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Event name</th>
                    <th>Student Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joinevent as $join)
                    <tr>
                        <td>{{ $join->event_id }}</td>
                        <td>{{ $join->event->title }}</td>
                        <td>{{ $join->user->name }}</td>
                        <td>{{ $join->status }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @if ($join->status == '1')
                                    <button class="btn btn-primary" disabled>Your already accept it</button>
                                @elseif ($join->status == '2')
                                    <button class="btn btn-danger" disabled>You reject it</button>
                                @else
                                    <form method="POST" action="/EditorManage/attendance/index/{{ $join->id }}/accept">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Accept</button>
                                    </form>
                                    <form method="POST" action="/EditorManage/attendance/index/{{ $join->id }}/reject">
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
