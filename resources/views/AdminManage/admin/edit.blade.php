@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Data</h1>
        <a href="/AdminManage/admin" class="btn btn-primary">Go back to Admin index</a><br><br>

        <form action="/AdminManage/admin/{{ $user->id }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="name" placeholder="Nama Anda" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email Anda"
                    value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password Anda"
                    value="{{ $user->password }}">
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
