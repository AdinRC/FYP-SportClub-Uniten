@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/StudentManage/joinclub/store" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div class="mb-3">
                <label for="student" class="form-label">Assign user for this Club</label><br>
                <select name="club_id">
                    @foreach ($club as $c)
                        <option value={{ $c->id }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <input type="hidden" name="club_id" value="{{ $club->id }}"> --}}
            <button type="submit">Request to Join</button>
        </form>
    </div>
@endsection
{{-- Create ni x pakai dah sebab kita punya terus direct store --}}
