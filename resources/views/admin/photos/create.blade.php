@extends('admin.layout')

@section('content')
    <h2>Add New Photo</h2>
    <form action="{{ route('admin.photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title (optional):</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div>
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" required>
        </div>
        <button type="submit">Add Photo</button>
    </form>
@endsection
