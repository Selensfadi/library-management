@extends('layouts.template')

@section('title','Orders')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1>Orders</h1>
  <a href="{{ route('orders.create') }}" class="btn btn-primary">+ New Order</a>
</div>

@if (session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

<table class="table table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th>#</th><th>User</th><th>Book</th><th>Price</th><th>Ordered at</th><th>Status</th><th>Emailed</th><th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse($orders as $o)
      <tr>
        <td>{{ $o->id }}</td>
        <td>{{ $o->user?->name ?? '-' }}</td>
        <td>{{ $o->book?->title ?? '-' }}</td>
        <td>{{ number_format($o->price,2) }}</td>
        <td>{{ $o->ordered_at }}</td>
        <td>{{ ucfirst($o->status) }}</td>
        <td>{{ $o->emailed ? 'Yes' : 'No' }}</td>
        <td class="d-flex gap-2">
          <a href="{{ route('orders.edit',$o) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('orders.destroy',$o) }}" method="POST">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete order #{{ $o->id }}?')">Delete</button>
          </form>
        </td>
      </tr>
    @empty
      <tr><td colspan="8" class="text-center">No orders yet.</td></tr>
    @endforelse
  </tbody>
</table>

@if(method_exists($orders,'links')) {{ $orders->links() }} @endif
@endsection
