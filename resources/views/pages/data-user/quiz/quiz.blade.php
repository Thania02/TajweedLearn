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
                    <h2 style="font-weight: bold; text-align:center;">Quiz</h2>
                    <h4 style="text-align:center;">test what you’ve learn here!</h4>
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-3">
                            <a href="{{url('quiz_phase1')}}" type="button" class="btn btn-block btn-primary btn-quiz ">
                                Phase 1
                            </a>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <a href="{{url('quiz_phase2')}}" type="button" class="btn btn-block btn-primary btn-quiz ">
                                Phase 2
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@endsection