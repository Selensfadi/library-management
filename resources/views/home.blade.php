@extends('layouts.template')

@section('title','Library')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="mb-3">Welcome to Library</h1>
            <p class="text-muted">Manage categories, books, orders and users from one place.</p>

            <div class="row g-3 mt-2">
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="{{ route('categories.index') }}" class="btn btn-primary w-100">Categories</a>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="{{ route('books.index') }}" class="btn btn-primary w-100">Books</a>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="{{ route('orders.index') }}" class="btn btn-primary w-100">Orders</a>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <a href="{{ route('users.index') }}" class="btn btn-primary w-100">Users</a>
                </div>
            </div>
        </div>
    </div>
@endsection
