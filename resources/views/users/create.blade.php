@extends('layouts.app')
@section('title','Create User')

@section('content')
<h1>Create User</h1>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('users.store') }}" method="POST" class="card p-4">
  @csrf
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Balance</label>
      <input type="number" step="0.01" name="balance" class="form-control" value="{{ old('balance', 0) }}">
    </div>
  </div>

  <div class="mt-3 d-flex gap-2">
    <button class="btn btn-success">Save</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection
