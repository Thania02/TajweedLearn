@extends('layouts.sidebar')

@section('content')
<section class="content">
    <div class="container-fluid">
        <h2>Hi {{Auth::user()->name}} ! Welcome to Tajweed Learn</h2>
    </div><!-- /.container-fluid -->
</section>
@endsection