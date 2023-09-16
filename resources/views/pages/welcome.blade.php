@extends('layouts.app')

@php
$title = 'Login'
@endphp

@section('content')

@if(session('error'))
<script>
    notif('error', '{{session("error")}}');
</script>
@endif


<div class="login-page" style="background-color:#0ECDCD">
    <h1 style="color:#FFFFFF; font-weight:bold;">Tajweed Learn</h1>
    <div class="login-box">
        <div class="login-logo">
        </div>
        <!-- /.login-logo -->

        <a type="button" href="{{url('register')}}" class="btn btn-block btn-welcome">
            Sign Up
        </a>
        <a type="button" href="{{url('login')}}" class="btn btn-block btn-welcome">
            Login
        </a>
    </div>
    <!-- /.login-box -->
</div>


