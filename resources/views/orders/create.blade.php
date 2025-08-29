@extends('layouts.template')

@section('title','Create Order')

@section('content')
<h1>Create Order</h1>
@if ($errors->any())
  <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif

<form method="POST" action="{{ route('orders.store') }}" class="card p-4">
  @csrf
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">User</label>
      <select name="user_id" class="form-select" required>
        <option value="" disabled selected>-- choose user --</option>
        @foreach($users as $u)
          <option value="{{ $u->id }}" @selected(old('user_id')==$u->id)>{{ $u->name }} ({{ $u->email }})</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">Book</label>
      <select name="book_id" class="form-select" required>
        <option value="" disabled selected>-- choose book --</option>
        @foreach($books as $b)
          <option value="{{ $b->id }}" @selected(old('book_id')==$b->id)>{{ $b->title }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="mt-3 d-flex gap-2">
    <button class="btn btn-success">Save</button>
    <a class="btn btn-secondary" href="{{ route('orders.index') }}">Cancel</a>
  </div>
</form>
@endsection
