@extends('layouts.backend.app')

@section('title', 'MPTFS - Forgot Password System')

@section('content')

<div class="login-box">
    {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif --}}
    <div class="card card-outline card-primary">
        <div class="logo text-center mt-2">
            <img src="{{asset('public/assets/images/MPTFS-LOGO.png')}}" alt="MPTFS-LOGO" width="100" height="100">
        </div>

        <div class="card-header text-center">
            <a href="{{ url('/') }}" class="h1" target="_blank"><b>MP</b>TFS</a>
        </div>

        <div class="card-body">
            <p class="login-box-msg">Here you can easily get a new password through the registered email ID.</p>
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
            <div class="input-group mb-3">
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                </div>
                <!-- /.col -->
            </div>
            </form>
            <p class="mt-3 mb-1">
            <a href="{{ route('login') }}">Back To Login</a>
            </p>
        </div>
        <!-- /.login-card-body -->
        <div class="card-footer d-flex flex-column text-center ftr">
            <small><a>Powered By</a></small>
            <small><a>Blue Ocean Tech Solutions Pvt. Ltd.</a></small>
        </div>
        <!-- /.card-footer -->
    </div>
</div>
<!-- /.login-box -->

@endsection

@push('js')

@endpush
