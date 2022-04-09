@extends('user.layouts.main')

@section('container')
    <div class="container" style="margin-top: 100px">
        <div class="bg-light p-5 rounded text-center">
            <h1>Email Verification</h1>
        
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    A fresh verification link has been sent to your email address.
                </div>
            @endif
            Before proceeding, please check your email for a verification link. If you did not receive the email,
            <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="d-inline btn btn-link p-0">
                    click here to request another
                </button>.
            </form>
        </div>
    </div>
@endsection