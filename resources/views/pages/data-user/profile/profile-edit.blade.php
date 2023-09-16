@extends('layouts.topnav')

@php
$subtitle = '';
@endphp

@section('content')
<section class="content" style="margin-top:5%;">
    <!-- /.container-fluid -->
    <div class=" container-fluid">
        <div class="card mt-4" style="background-color:#CFF5F5; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); color:#8B8B8B; padding:20px;">
            <!-- /.card-header -->
            <div class=" row">
                <div class="col-12 col-lg-12 ">
                    <div class="text-center">
                        <img src="{{url('assets/profile/'.$data->photo)}}" class="profile-user-img img-fluid img-circle" alt="User profile picture">
                        <h4 style="text-align:center; margin-bottom:5px;">Edit Profile</h4>
                    </div>

                    <form class="form-horizontal mt-3" method="POST" action="{{route('profile.update',$data->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" value="{{$data->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{$data->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName2" name="username" placeholder="Username" value="{{$data->username}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <div class="input-group-append">
                                    <input type="password" id="inputPassword" name="password" minlength="8" class="form-control" placeholder="Password">
                                    <div class="input-group-text" onclick="toggle('inputPassword')">
                                        <span class="fas fa-lock" id="lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputphoto" class="col-sm-2 col-form-label">photo Profile</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="inputphoto" name="photo" placeholder="photo" value="{{$data->photo}}">
                            </div>
                        </div>
                        <div style="text-align:right;">
                            <button type="submit" class="btn btn-primary btn-learn" style="background-color: #3E688E; border-color:#3E688E; width:150px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size:18px; ">
                                Edit Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    <!-- /.card-body -->
    </div>
    </div>
</section>
@endsection