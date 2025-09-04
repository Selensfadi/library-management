@extends('layouts.template')
@section('title','Verify Email')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-7">
    <h4 class="mb-3">Verify your email</h4>
    <p class="text-muted">
      تم إرسال رابط التحقق إلى بريدك الإلكتروني. إن لم يصلك، يمكنك طلب رابط جديد.
    </p>

    @if (session('status') == 'verification-link-sent')
      <div class="alert alert-success">
        تم إرسال رابط تحقق جديد إلى بريدك الإلكتروني.
      </div>
    @endif

    <div class="d-flex gap-2">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Resend verification</button>
      </form>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-secondary">Log out</button>
      </form>
    </div>
  </div>
</div>
@endsection
