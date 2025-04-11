@extends('layout')

@section('content')
    <h1>Edit Category</h1>
    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-2">Update Category</button>
    </form>
@endsection
