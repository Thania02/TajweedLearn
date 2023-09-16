@extends('layouts.main')

@section('container')

<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="height:60px; background-color: #0ECDCD;">
    <div class="container">
        <a href="#" class="navbar-brand">
            <?php $user = App\Models\User::find(Illuminate\Support\Facades\Auth::user()->id) ?>
            <img src="{{url('assets/profile/'.$user->photo)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="position:relative; width:90px; top:30px; height:90px;">
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{url('dashboard')}}" class="nav-link {{($title == 'Dashboard') ? '' : 'text-secondary'}}" style="font-weight: bold;">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('profile')}}" class="nav-link {{($title == 'Profile') ? '' : 'text-secondary'}}" style="font-weight: bold;">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('learn_tajwid')}}" class="nav-link {{($title == 'Tajweed Learn') ? '' : 'text-secondary'}}" style="font-weight: bold;">Tajweed Learn</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('quiz')}}" class="nav-link {{($title == 'Quiz' || $title == 'Quiz Phase 1' || $title == 'Quiz Phase 2') ? '' : 'text-secondary'}}" style="font-weight: bold;">Quiz</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('my_proggress')}}" class="nav-link {{($title == 'My Proggress') ? '' : 'text-secondary'}}" style="font-weight: bold;">My Proggress</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('about')}}" class="nav-link {{($title == 'About') ? '' : 'text-secondary'}}" style="font-weight: bold;">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" style="font-weight: bold;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
    </div>
</nav>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height: auto; background-color: #ffff;">
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
</div>
@endsection