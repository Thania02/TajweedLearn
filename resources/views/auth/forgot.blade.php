@extends('layouts.app')

@php
$title = 'Login'
@endphp

@section('content')

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: '{{session("error")}}',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

<div class="login-page" style="background-color:#0ECDCD">
    <div class="login-box">
        <div class="login-logo">
            <h1 style="color:#FFFFFF; font-weight:bold;">Tajweed Learn</h1>
        </div>
        <!-- /.login-logo -->
        <div class="card" style="border-radius:10px;">
            <div class="card-body" style=" background-color:#cff5f5; border-radius:10px; padding:30px;">
                <h2 class="login-box-msg ">Forgot Password</h2>
                <p class="text-center">input username to reset password</p>
                <form action="{{ route('forgot_proses') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control form-input" placeholder="Input Username">
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-block btn-primary btn-input ">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</div>

<script>
    var state = false;

    function toggle() {
        if (state) {
            document.getElementById("inputPassword").setAttribute("type", "password");
            document.getElementById("eye").setAttribute("class", "bi bi-eye");
            state = false;
        } else {
            document.getElementById("inputPassword").setAttribute("type", "text");
            document.getElementById("eye").setAttribute("class", "bi bi-eye-slash");
            state = true;
        }
    }
</script>

@endsection