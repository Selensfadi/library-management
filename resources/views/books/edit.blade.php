@extends('layouts.app')
@section('title','Edit Book')

@section('content')
<h1>Edit Book</h1>
@if ($errors->any())
  <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif

<form method="POST" action="{{ route('books.update',$book) }}" class="card p-4">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Title</label>
      <input name="title" class="form-control" value="{{ old('title',$book->title) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Author</label>
      <input name="author" class="form-control" value="{{ old('author',$book->author) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Category</label>
      <select name="category_id" class="form-select">
        <option value="">-- None --</option>
        @foreach($categories as $c)
          <option value="{{ $c->id }}" @selected(old('category_id',$book->category_id)==$c->id)>{{ $c->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-3">
      <label class="form-label">Price</label>
      <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price',$book->price) }}">
    </div>
    <div class="col-md-3">
      <label class="form-label">Stock</label>
      <input type="number" name="stock" class="form-control" value="{{ old('stock',$book->stock) }}">
    </div>
    <div class="col-md-6">
      <label class="form-label">Release date</label>
      <input type="date" name="release_date" class="form-control" value="{{ old('release_date',$book->release_date) }}">
    </div>
    <div class="col-12">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control">{{ old('description',$book->description) }}</textarea>
    </div>
  </div>
  <div class="mt-3 d-flex gap-2">
    <button class="btn btn-primary">Update</button>
    <a class="btn btn-secondary" href="{{ route('books.index') }}">Back</a>
  </div>
</form>
@endsection
