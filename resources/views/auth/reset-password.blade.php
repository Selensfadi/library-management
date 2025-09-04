@extends('layouts.template')
@section('title','Reset Password')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h4 class="mb-3">Reset password</h4>

    <form method="POST" action="{{ route('password.update') }}">
      @csrf

      <input type="hidden" name="token" value="{{ $request->route('token') }}">

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', request('email')) }}" class="form-control @error('email') is-invalid @enderror" required autofocus>
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">New Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Reset</button>
    </form>
  </div>
</div>
@endsection
