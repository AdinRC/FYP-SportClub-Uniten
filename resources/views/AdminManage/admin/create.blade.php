@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Add Admin</h1>
        <a href="/AdminManage/admin" class="btn btn-primary">Go back to Admin Index</a><br><br>

        <form action="/AdminManage/admin/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Nama Anda">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email Anda">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password Anda">
            </div>
            <div class="mb-3">
                <input type="hidden" name="role" value="admin">
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
