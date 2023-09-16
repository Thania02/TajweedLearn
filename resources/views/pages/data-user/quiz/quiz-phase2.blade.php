@extends('layouts.topnav')

@php
$subtitle = '';
@endphp
<style>
    input[type="radio"] {
        display: none;
        width: 20px;
        height: 20px;
    }

    input[type="radio"]+label::before {
        content: "";
        display: inline-block;
        vertical-align: middle;
        width: 25px;
        height: 25px;
        margin-right: 10px;
        border: 2px solid #ccc;
        border-radius: 50%;
        background-color: white;
    }

    input[type="radio"]:checked+label::before {
        background-color: #0ECDCD;
    }

    input[type="radio"]:checked+label {
        color: #0ECDCD;
    }

    label {
        padding: 5px;
        font-size: 18px;
        font-weight: 100;
        cursor: pointer;
    }
</style>

@section('content')
<section class="content">
    <div class="container-fluid">
        <h2 style="text-align:center; font-weight:bold; margin-top:15px;">Quiz Phase 2</h2>
        <h4 style="text-align:center;">read the task and choose the correct answers! </h4>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
        @php $i=1; @endphp
        <form action="{{route('finish.store')}}" method="post">
            @csrf
            <input type="hidden" value="quiz phase 2" name="quiz_type">
            @foreach($data as $data)
            <table class="{{($data->id == $data_awal->id) ? '' : 'd-none' }} quiz">
                <tr>
                    <td style="width: 5%; padding:20px;">
                        <p style="padding:10px; padding-left:20px; height:50px; width:50px; background-color:#0ECDCD; border-radius:100%; color:#fff; font-weight:bold; font-size:20px;">{{$i}}</p>
                    </td>
                    <td>
                        <img src="{{url('assets/quiz/'.$data->file)}}" width="15%">
                        <h5>{{$data->question}}</h5>.
                    </td>
                </tr>
                @foreach($data->quizDetail as $data_quiz)
                <tr>
                    <td></td>
                    <td>
                        <input type="radio" id="answer_code{{$data_quiz->id}}" name="options_question_{{$data->id}}" value="{{$data_quiz->answer_code}}">
                        <label for="answer_code{{$data_quiz->id}}">{{$data_quiz->answer}}</label>
                    </td>
                </tr>
                @endforeach
            </table>
            @php $i++ @endphp
            @endforeach
            <div style="float:right;">
                <div class="row">
                    <button type="button" class="btn btn-primary btn-learn prevBtn d-none" style="margin-left:10px; background-color: #0ECDCD; border-color:#0ECDCD; width:150px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size:18px; ">
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary btn-learn nextBtn" style="margin-left:10px; background-color: #0ECDCD; border-color:#0ECDCD; width:150px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size:18px; ">
                        Next
                    </button>
                    <button type="submit" class="btn btn-primary btn-learn btnFinish d-none" style="margin-left:10px; background-color: #0ECDCD; border-color:#0ECDCD; width:150px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size:18px; ">
                        Finish
                    </button>
                </div>
            </div>

            <script>
                let i = 0;
                $(".prevBtn").on("click", function() {
                    if (i > 0) {
                        let x = i - 1;
                        $(".quiz").eq(i).addClass("d-none");
                        $(".quiz").eq(x).removeClass("d-none");
                        $(".prevBtn").removeClass("d-none");
                        $(".btnFinish").addClass("d-none");
                        $(".nextBtn").removeClass("d-none");
                        i--;
                    }

                    if (i == 0) {
                        $(".prevBtn").addClass("d-none");
                    }
                });

                $(".nextBtn").on("click", function() {
                    if (i < <?= $i - 2 ?>) {
                        let x = i + 1;
                        $(".quiz").eq(i).addClass("d-none");
                        $(".quiz").eq(x).removeClass("d-none");
                        $(".prevBtn").removeClass("d-none");
                        i++;
                    }

                    if (i == <?= $i - 2 ?>) {
                        $(".btnFinish").removeClass("d-none");
                        $(".prevBtn").removeClass("d-none");
                        $(".nextBtn").addClass("d-none");
                    }
                });
            </script>
        </form>
    </div>
</section>
@endsection