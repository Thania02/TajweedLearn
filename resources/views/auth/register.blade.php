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

<div class="register-page" style="background-color:#0ECDCD;">
    <div class="register-box">
        <div class="register-logo">
            <h1 style="color:#FFFFFF; font-weight:bold;">Tajweed Learn</h1>
        </div>

        <div class="card" style="border-radius:10px;">
            <div class="card-body register-card-body" style="background-color:#cff5f5; border-radius:10px; padding:30px;">
                <h3 class="login-box-msg">Sign Up</h3>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-input" placeholder="Full name" name="name">
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-input" placeholder="Email" name="email">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-input" placeholder="Username" name="username">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="inputPassword" name="password" class="form-control form-input" placeholder="Password">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="RetypePassword" class="form-control form-input" name="password_confirmation" placeholder="Confirm password">
                    </div>
                    <p class="text-center mt-2">Already have an account? <a href="{{ url('login') }}" class="fw-bold">Login</a></p>

                    <div class="row">
                        <div class="col-12 mb-5">
                            <button type="submit" class="btn btn-block btn-primary  btn-input">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
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