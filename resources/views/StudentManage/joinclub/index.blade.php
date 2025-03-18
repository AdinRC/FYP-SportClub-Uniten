@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Club Index</h1>

        <a class="btn btn-primary " href="/home">Go to Home</a>
        {{-- <a class="btn btn-success " href="/StudentManage/joinclub/create">Join Club</a><br> --}}

        <table class="table table-hover">
            <tr>
                <td>No Club ID</td>
                <td>Nama Club</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
            @foreach ($club as $e)
                <tr>
                    <td>{{ $e->id }}</td>
                    <td>{{ $e->name }}</td>
                    <td>{{ $e->description }}</td>
                    <td>
                        {{-- <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/StudentManage/club/index_Event/{{ $e->id }}" class="btn btn-success">View</a>
                        </div> --}}
                        @if ($membership->firstWhere('club_id', $e->id) && $membership->firstWhere('club_id', $e->id)->status == 0)
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-primary" disabled>Your already click join and it is pending</button>
                            </div>
                        @elseif ($membership->firstWhere('club_id', $e->id) && $membership->firstWhere('club_id', $e->id)->status == 1)
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-primary" disabled>You Join It</button>
                            </div>
                        @else
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="/StudentManage/joinclub/store" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                    <input type="hidden" name="club_id" value="{{ $e->id }}">
                                    <button class="btn btn-primary  " type="submit">Join</button>
                                </form>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
