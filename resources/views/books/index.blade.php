@extends('layouts.app')
@section('title','Books')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Books</h1>
  <a href="{{ route('books.create') }}" class="btn btn-primary">+ Add Book</a>
</div>

@if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th>#</th><th>Title</th><th>Author</th><th>Category</th><th>Price</th><th>Stock</th><th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($books as $b)
      <tr>
        <td>{{ $b->id }}</td>
        <td>{{ $b->title }}</td>
        <td>{{ $b->author }}</td>
        <td>{{ $b->category?->name ?? '-' }}</td>
        <td>{{ number_format($b->price,2) }}</td>
        <td>{{ $b->stock }}</td>
        <td class="d-flex gap-2">
          <a href="{{ route('books.edit',$b) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('books.destroy',$b) }}" method="POST">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete {{ $b->title }}?')">Delete</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="7" class="text-center">No books yet.</td></tr>
    @endforelse
  </tbody>
</table>

@if(method_exists($books,'links')) {{ $books->links() }} @endif
@endsection
