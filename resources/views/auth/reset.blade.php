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
                <h2 class="login-box-msg ">Reset Password</h2>
                <form action="{{ route('reset_proses') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control form-input" placeholder="New Password">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control form-input" placeholder="Confirm New Password">
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