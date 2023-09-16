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
        <div class="card mt-4" style="background-color: rgba(1, 69, 106, 0.76); box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); color:#ffff;">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="container">
                    <h2 style="font-weight: bold; text-align:center;">Tajweed Learn</h2>
                    <h4 style="text-align:center;">You are welcome to Tajweed Learn from us</h4>
                    <div class="row">
                        @foreach($data as $data)
                        <div class="col-12 col-lg-3 mb-3">
                            <a href="{{route('learn_tajwid.show',$data->type_learn)}}" type="button" class="btn btn-block btn-primary btn-learn ">
                                {{$data->type_learn}}
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@endsection