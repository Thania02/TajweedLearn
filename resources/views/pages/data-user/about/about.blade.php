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
                    <h2 style="font-weight: bold; text-align:center;">About Us</h2>
                    <h6 style="text-align:center;">"Welcome to our Tajweed learn web application, where we offer a comprehensive and engaging learning experience for students of all levels. Our platform provides a range of resources to support your Tajweed learning journey, including interactive lessons, quizzes, and a progress dashboard to track your development. With our user-friendly interface, you can easily navigate between different features and customize your learning experience to suit your needs. Whether you're a beginner or an advanced learner, our expert instructors are here to guide you towards mastering the principles of proper Quranic recitation. Join our community today and start your journey towards reciting the Quran with precision and excellence."</h6>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@endsection