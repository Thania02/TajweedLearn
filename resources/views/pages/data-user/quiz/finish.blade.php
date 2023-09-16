@extends('layouts.app')

@php
@endphp

@section('content')

@if(session('error'))
<script>
    notif('error', '{{session("error")}}');
</script>
@endif


<div class="login-page" style="background-color:#0ECDCD; text-align:center; color:#fff;">
    <img src="{{url('assets/dist/img/icon.png')}}" width="8%" alt="">
    <h3 style="font-weight: bold; margin-bottom:3%; margin-top:1%; ">Congratulation, you have<br> finished your test!</h3>
    <h4>Your score is <br><b>{{$jumlah_question_benar}}/{{$jumlah_all_quiz}}</b></h2>
        <div class="row" style="width: 50%; margin-top:2%;">
            <div class="col-6">
                <a type="button" href="{{url('result_quiz/'.$task_code)}}" class="btn btn-block btn-quiz" style="color:#fff;">
                    View Answer
                </a>
            </div>
            <div class="col-6">
                <a type="button" href="{{url('dashboard')}}" class="btn btn-block btn-view" style="color:#fff;">
                    Dashboard
                </a>
            </div>
        </div>
        <!-- /.login-logo -->
</div>
<!-- /.login-box -->
</div>

@endsection