@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Event Index</h1>

        <a class="btn btn-primary " href="/StudentManage/joinclub">Go to Club</a>

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
                    <td>
                        @if ($joinevent->where('event_id', $e->id)->where('user_id', auth()->id())->first() &&
                            $joinevent->where('event_id', $e->id)->where('user_id', auth()->id())->first()['status'] == 0)
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-primary" disabled>Editor will validate your attendance</button>
                            </div>
                        @elseif ($joinevent->where('event_id', $e->id)->where('user_id', auth()->id())->first() &&
                            $joinevent->where('event_id', $e->id)->where('user_id', auth()->id())->first()['status'] == 1)
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-primary" disabled>Hadir</button>
                            </div>
                        @elseif ($joinevent->where('event_id', $e->id)->where('user_id', auth()->id())->first() &&
                            $joinevent->where('event_id', $e->id)->where('user_id', auth()->id())->first()['status'] == 2)
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-primary" disabled>Tidak Hadir</button>
                            </div>
                        @elseif ($membership->Where('club_id', $e->club->id) && $membership->Where('club_id', $e->club->id)->status == 1)
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="/StudentManage/event/store" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <input type="hidden" name="event_id" value="{{ $e->id }}">
                                    <button class="btn btn-primary  " type="submit">Join</button>
                                </form>
                            </div>
                        @else
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-primary" disabled>You Must Join Club First</button>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
