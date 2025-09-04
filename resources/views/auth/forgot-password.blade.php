@extends('layouts.template')
@section('title','Forgot Password')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-6">
    <h4 class="mb-3">Forgot password</h4>
    <p class="text-muted">أدخل بريدك الإلكتروني وسنرسل رابط إعادة التعيين.</p>

    @if (session('status'))
      <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required autofocus>
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <button type="submit" class="btn btn-primary w-100">Send reset link</button>
    </form>
  </div>
</div>
@endsection
