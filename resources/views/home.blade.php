@extends('layouts.template')

@section('title','Library')

@section('content')
  <h1 class="mb-3">Welcome to Library</h1>

  <a href="{{ route('books.index') }}" class="btn btn-primary mb-3">Go to Books</a>

  <div class="row g-3">
    <div class="col-md-3">
      <a class="card card-body text-center" href="{{ route('categories.index') }}">Categories</a>
    </div>
    <div class="col-md-3">
      <a class="card card-body text-center" href="{{ route('books.index') }}">Books</a>
    </div>
    <div class="col-md-3">
      <a class="card card-body text-center" href="{{ route('orders.index') }}">Orders</a>
    </div>
    <div class="col-md-3">
      <a class="card card-body text-center" href="{{ route('users.index') }}">Users</a>
    </div>
  </div>
@endsection
