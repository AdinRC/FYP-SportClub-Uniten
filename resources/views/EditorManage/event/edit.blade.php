@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Data</h1>
        <a href="/EditorManage/event" class="btn btn-primary">Go back to Club index</a><br><br>

        <form action="/EditorManage/event/{{ $event->id }}" method="POST">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Nama event"
                    value="{{ $event->title }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control" name="description" cols="30" rows="10" placeholder="Description event"
                    value="{{ $event->description }}"></textarea>
            </div>
            <div class="mb-3">
                <label for="file_path" class="form-label">file_path</label>
                <input type="text" class="form-control" name="file_path" placeholder="Nama event"
                    value="{{ $event->file_path }}">
            </div>
            <br><br>
            <input class="btn btn-info" type="submit" name="submit" value="save">
        </form>
    </div>
@endsection
