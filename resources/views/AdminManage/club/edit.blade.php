@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Data</h1>
        <a href="/AdminManage/club" class="btn btn-primary">Go back to Club index</a><br><br>

        <form action="/AdminManage/club/{{ $club->id }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Club</label>
                <input type="text" class="form-control" name="name" placeholder="Nama Club" value="{{ $club->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" name="description" cols="30" rows="10" placeholder="Description Club"
                    value="{{ $club->description }}"></textarea>
            </div>
            <div class="mb-3">
                <label for="EditorClub" class="form-label">Assign Uniten Club and Societies Administrator for this
                    Club</label><br>
                <select name="user_id">
                    @foreach ($user as $users)
                        <option value={{ $users->id }}>{{ $users->name }}</option>
                    @endforeach
                    {{-- <option value={{ $club->user->id }}>{{ $club->user->name }}</option> --}}
                </select>
            </div>
            <br><br>
            <input class="btn btn-info" type="submit" name="submit" value="save">
            {{-- 
        Code bawah ni untuk digunakan di Posts nanti
        <textarea name="" id="" cols="30" rows="10"></textarea> 
    --}}
        </form>
    </div>
@endsection
