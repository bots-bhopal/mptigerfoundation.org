@extends('layouts.backend.app')

@section('title', 'MPTFS - Login System')

@push('css')
    <style>
        .input-group-text {
            width: 42px;
        }

        .input-group-text span.fas.fa-eye {
            cursor: pointer;
        }

    </style>
@endpush

@section('content')

    @php
    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];
        $is_remember = "checked='checked'";
    } else {
        $email = '';
        $password = '';
        $is_remember = '';
    }
    @endphp

    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="logo text-center mt-2">
                <img src="{{ asset('public/assets/images/MPTFS-LOGO.png') }}" alt="MPTFS-LOGO" width="80" height="80">
            </div>

            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1" target="_blank"><b>MP</b>TFS</a>
            </div>

            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') ? old('email') : $email }}" placeholder="Email" required
                            autocomplete="off" autofocus>
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
                    <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Password"
                            value="{{ $password }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-eye" id="togglePassword"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" {{ $is_remember }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!-- Authentication Links -->
                @guest
                    {{-- @if (Route::has('password.request'))
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">Forgot Your Password ?</a>
                    </p>
                @endif --}}

                    @if (Route::has('register'))
                        <p class="mb-0">
                            <a href="{{ route('register') }}" class="text-center">Register a new user</a>
                        </p>
                    @endif
                @endguest
            </div>
            <!-- /.card-body -->
            <div class="card-footer d-flex flex-column text-center ftr">
                <small><a>Powered By</a></small>
                <small><a href="https://blueoceantech.in/" target="_blank">Blue Ocean Tech Solutions Pvt. Ltd.</a></small>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- Modal -->
        <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger" id="exampleModalLabel" style="font-weight: 600;"><i
                                class="fas fa-exclamation-triangle" style="margin-right: 5px;"></i>Important
                            Information</h4>
                    </div>
                    <div class="modal-body text-justify" style="font-size: 22px;">
                        You are now logging into the official government website of MPTFS. Please note that your <b>ISP
                            Details,
                            VPN(If any), IP Address</b> etc. will be logged at our server. Press '<b>Ok</b>' to proceed.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="ok" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#noticeModal').modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            })
        });

        $('#ok').click(function() {
            $('#noticeModal').modal('hide');
        });

        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endpush
