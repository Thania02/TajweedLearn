@extends('layouts.app')

@php
$title = 'Login' 
@endphp

@section('content')

@foreach($errors->all() as $error)
<script>
    Swal.fire({
        icon: 'error',
        title: '<?= $error ?>',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endforeach 
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
                <h2 class="login-box-msg ">Log In</h2>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control form-input" placeholder="Input Username">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control form-input" id="inputPassword" placeholder="Input Password">
                    </div>

                    <p class="text-center mt-2">Don't have any account? <a href="{{ url('register') }}" class="fw-bold">Sign Up</a></p>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-block btn-primary btn-input ">
                                Login
                            </button>
                            <p class="text-center mt-2"><a href="{{ route('forgot') }}" class="fw-bold">Forgot Password?</a></p>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</div>@extends('layouts.app') 
// Extends the 'layouts.app' view to include its content.

