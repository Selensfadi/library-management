@extends('layouts.app')
@section('title','Edit Order')

@section('content')
<h1>Edit Order #{{ $order->id }}</h1>
@if ($errors->any())
  <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif

<form method="POST" action="{{ route('orders.update',$order) }}" class="card p-4">
  @csrf @method('PUT')
  <div class="row g-3">
    <div class="col-md-6">
      <label class="form-label">User</label>
      <select name="user_id" class="form-select" required>
        @foreach($users as $u)
          <option value="{{ $u->id }}" @selected(old('user_id',$order->user_id)==$u->id)>{{ $u->name }} ({{ $u->email }})</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
      <label class="form-label">Book</label>
      <select name="book_id" class="form-select" required>
        @foreach($books as $b)
          <option value="{{ $b->id }}" @selected(old('book_id',$order->book_id)==$b->id)>{{ $b->title }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-4">
      <label class="form-label">Status</label>
      <select name="status" class="form-select" required>
        @php $status = old('status',$order->status); @endphp
        <option value="paid" @selected($status=='paid')>Paid</option>
        <option value="pending" @selected($status=='pending')>Pending</option>
        <option value="cancelled" @selected($status=='cancelled')>Cancelled</option>
      </select>
    </div>
  </div>
  <div class="mt-3 d-flex gap-2">
    <button class="btn btn-primary">Update</button>
    <a class="btn btn-secondary" href="{{ route('orders.index') }}">Back</a>
  </div>
</form>
@endsection
