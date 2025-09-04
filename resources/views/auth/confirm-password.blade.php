@extends('layouts.template')
@section('title','Confirm Password')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h4 class="mb-3">Confirm your password</h4>
    <p class="text-muted">لإتمام العملية، أدخل كلمة المرور.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
      @csrf

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <button type="submit" class="btn btn-primary w-100">Confirm</button>
    </form>
  </div>
</div>
@endsection
