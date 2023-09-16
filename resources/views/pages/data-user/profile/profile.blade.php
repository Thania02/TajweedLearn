@extends('layouts.topnav')

@php
$subtitle = '';
@endphp

@section('content')
<section class="content">
    <div class="container-fluid">
        <h1 style="margin-left:16%; margin-top:5px;">Hi {{Auth::user()->name}} ! Welcome to Tajweed Learn</h1>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <div class="card mt-4" style="background-color:#CFF5F5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); color:#8B8B8B;">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="container">
                    <h3 style="font-weight: bold;">Fullname</h3>
                    <h4 style="margin-top:-2px; margin-bottom: 20px;">{{$data->name}}</h4>
                    <h3 style="font-weight: bold;">Username</h3>
                    <h4 style="margin-top:-2px; margin-bottom: 20px;">{{$data->username}}</h4>
                    <h3 style="font-weight: bold;">Email</h3>
                    <h4 style="margin-top:-2px; margin-bottom: 20px;">{{$data->email}}</h4>
                    <div style="text-align:right;">
                        <a href="{{route('profile.show',$data->id)}}" type="button" class="btn btn-primary btn-learn" style="background-color: #3E688E; border-color:#3E688E; width:150px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size:18px; ">
                            Edit Profile
                        </a>
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@endsection