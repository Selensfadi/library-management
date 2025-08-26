@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Add Category</a>

    @if($categories->isEmpty())
        <p>No categories yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $c)
                    <tr>
                        <td>{{ $c->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $c) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('categories.destroy', $c) }}" method="POST" style="display:inline-block">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete {{ $c->name }}?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
