@extends('layouts.app')
@section('title', 'Library Dashboard')

@section('content')
  {{-- Hero / Jumbotron --}}
  <div class="p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
      <h1 class="display-6 fw-bold">Welcome to Library</h1>
      <p class="col-md-8 fs-5">
        Manage categories, books, orders and users from one place.
      </p>
      <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg">
        Go to Books
      </a>
    </div>
  </div>

  {{-- Quick links / Cards --}}
  <div class="row g-4">
    <div class="col-md-3">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title mb-2">Categories</h5>
          <p class="text-muted mb-3">Organize your books by topics.</p>
          <a href="{{ route('categories.index') }}" class="btn btn-outline-primary w-100">Open</a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title mb-2">Books</h5>
          <p class="text-muted mb-3">Create, edit and manage books.</p>
          <a href="{{ route('books.index') }}" class="btn btn-outline-primary w-100">Open</a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title mb-2">Orders</h5>
          <p class="text-muted mb-3">Track purchases and statuses.</p>
          <a href="{{ route('orders.index') }}" class="btn btn-outline-primary w-100">Open</a>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title mb-2">Users</h5>
          <p class="text-muted mb-3">Manage accounts and balances.</p>
          <a href="{{ route('users.index') }}" class="btn btn-outline-primary w-100">Open</a>
        </div>
      </div>
    </div>
  </div>
@endsection
