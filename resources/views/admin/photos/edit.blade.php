@extends('admin.layout')

@section('content')

<h2>Edit Photo</h2>
    <form action="{{ route('admin.photos.update', $photo) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title (optional):</label>
            <input type="text" name="title" id="title" value="{{ old('title', $photo->title) }}">
        </div>
        <div>
            <label>Current Photo:</label>
            <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}" width="100">
        </div>
        <div>
            <label for="photo">New Photo (if you want to update):</label>
            <input type="file" name="photo" id="photo">
        </div>
        <button type="submit">Update Photo</button>
    </form>
@endsection
