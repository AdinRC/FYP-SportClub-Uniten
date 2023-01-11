@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Add Club</h1>
        <a href="/AdminManage/club" class="btn btn-primary">Go back to Club Index</a><br><br>

        <form action="/AdminManage/club/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="clubname" class="form-label">Club Name</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Club">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" name="description" cols="30" rows="10" placeholder="Description Club"></textarea>
            </div>
            <div class="mb-3">
                <label for="EditorClub" class="form-label">Assign Uniten Club and Societies Administrator for this
                    Club</label><br>
                <select name="user_id">
                    {{-- <option value=" 1">--select--</option> --}}
                    @foreach ($user_id as $c)
                        <option value={{ $c->id }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <br><br>
            <input class="btn btn-info" type="submit" name="submit" value="save">
            {{-- 
            Code bawah ni untuk digunakan di Posts nanti
            <textarea class="form-control" name="" cols="30" rows="10"></textarea> 
        --}}
        </form>
    </div>
@endsection
