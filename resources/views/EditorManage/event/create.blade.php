@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Add Event</h1>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Go back to Editor Club
            Index</a>
        <br><br>

        <form action="/EditorManage/event/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" name="description" cols="30" rows="10" placeholder="Description event"></textarea>
            </div>
            {{-- Ni untuk editor letak gambar event --}}
            <div class="mb-3">
                <label for="file" class="form-label">file_path</label>
                <input type="file" name="file" accept="images/*">
            </div>

            <div class="mb-3">
                <label for="EditorClub" class="form-label">Assign Uniten Club and Societies Administrator for this
                    Club</label><br>
                <select name="club_id">
                    @foreach ($club as $c)
                        <option value={{ $c->id }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <br><br>
            <input class="btn btn-info" type="submit" name="submit" value="save">
        </form>
    </div>
@endsection
