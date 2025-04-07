@extends('admin.layout')

@section('content')
<div class="card bg-dark text-light">
    <div class="card-header">
        <h2 class="mb-0">Photo Gallery</h2>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.photos.create') }}" class="btn btn-custom mb-3">Add New Photo</a>

        <table class="table table-bordered admin-table">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($photos as $photo)
                <tr>
                    <td class="text-center align-middle text-black"><b>{{ $photo->id }}</b></td>
                    <td class="text-center align-middle text-black"><td>{{ Str::limit( $photo->title , 50, '...') }}</td></td>
                    <td class="text-center align-middle">
                        <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}" width="300">
                    </td>
                    <td class="text-center align-middle">
                        <a href="{{ route('admin.photos.edit', $photo) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.photos.destroy', $photo) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">No photos found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
