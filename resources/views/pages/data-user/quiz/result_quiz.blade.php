@extends('layouts.topnav')

@php
$subtitle = '';
@endphp

@section('content')
<section class="content">
    <div class="container-fluid">
        <h2 style="text-align:center; font-weight:bold; margin-top:15px;">Quiz Phase 2</h2>
        <h4 style="text-align:center;">read the task and choose the correct answers! </h4>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
        @php $i=1; @endphp
        @foreach($data as $data)
        <table>
            <tr>
                <td style="width: 5%; padding:20px;">
                    <p style="padding:10px; padding-left:20px; height:50px; width:50px; background-color:#0ECDCD; border-radius:100%; color:#fff; font-weight:bold; font-size:20px;">{{$i}}</p>
                </td>
                <td>
                    @if($data->quiz->quiz_type == 'quiz phase 1')
                    <audio src="{{url('assets/quiz/'.$data->quiz->file)}}" controls> </audio>
                    @else
                    <img src="{{url('assets/quiz/'.$data->quiz->file)}}" width="15%">
                    @endif
                    <h5 style="margin-left:10px;">{{$data->quiz->question}}</h5>.
                </td>
            </tr>
            <?php
            $answerA = App\Models\quizDetailModel::where('answer_code', 'A')->where('quiz_id', $data->quiz_id)->first();
            $answerB = App\Models\quizDetailModel::where('answer_code', 'B')->where('quiz_id', $data->quiz_id)->first();
            $answerC = App\Models\quizDetailModel::where('answer_code', 'C')->where('quiz_id', $data->quiz_id)->first();
            $answerD = App\Models\quizDetailModel::where('answer_code', 'D')->where('quiz_id', $data->quiz_id)->first();
            $answerE = App\Models\quizDetailModel::where('answer_code', 'E')->where('quiz_id', $data->quiz_id)->first();
            ?>
            <tr>
                <td></td>
                <td>
                    <input type="radio" id="answer_code{{$data->quiz->id}}" class="{{($data->status == 'false') ? 'falseAnswer' : ''}}" name="options_question{{$data->id}}" value="A" {{($data->answer == 'A') ? "checked" : ""}}>
                    @if($data->quiz->quiz_type == 'quiz phase 1')
                    <label for="answer_code{{$data->quiz->id}}"><img src="{{url('assets/quiz/'.$answerA->answer)}}" alt="" width="40%"></label>
                    @else
                    <label for="answer_code{{$data->quiz->id}}">{{$answerA->answer}}</label>
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="radio" id="answer_code{{$data->quiz->id}}" class="{{($data->status == 'false') ? 'falseAnswer' : ''}}" name="options_question{{$data->id}}" value="B" {{($data->answer == 'B') ? "checked" : ""}}>
                    @if($data->quiz->quiz_type == 'quiz phase 1')
                    <label for="answer_code{{$data->quiz->id}}"><img src="{{url('assets/quiz/'.$answerB->answer)}}" alt="" width="40%"></label>
                    @else
                    <label for="answer_code{{$data->quiz->id}}">{{$answerB->answer}}</label>
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="radio" id="answer_code{{$data->quiz->id}}" class="{{($data->status == 'false') ? 'falseAnswer' : ''}}" name="options_question{{$data->id}}" value="C" {{($data->answer == 'C') ? "checked" : ""}}>
                    @if($data->quiz->quiz_type == 'quiz phase 1')
                    <label for="answer_code{{$data->quiz->id}}"><img src="{{url('assets/quiz/'.$answerC->answer)}}" alt="" width="40%"></label>
                    @else
                    <label for="answer_code{{$data->quiz->id}}">{{$answerC->answer}}</label>
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="radio" id="answer_code{{$data->quiz->id}}" class="{{($data->status == 'false') ? 'falseAnswer' : ''}}" name="options_question{{$data->id}}" value="D" {{($data->answer == 'D') ? "checked" : ""}}>
                    @if($data->quiz->quiz_type == 'quiz phase 1')
                    <label for="answer_code{{$data->quiz->id}}"><img src="{{url('assets/quiz/'.$answerD->answer)}}" alt="" width="40%"></label>
                    @else
                    <label for="answer_code{{$data->quiz->id}}">{{$answerD->answer}}</label>
                    @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="radio" id="answer_code{{$data->quiz->id}}" class="{{($data->status == 'false') ? 'falseAnswer' : ''}}" name="options_question{{$data->id}}" value="E" {{($data->answer == 'E') ? "checked" : ""}}>
                    @if($data->quiz->quiz_type == 'quiz phase 1')
                    <label for="answer_code{{$data->quiz->id}}"><img src="{{url('assets/quiz/'.$answerE->answer)}}" alt="" width="40%"></label>
                    @else
                    <label for="answer_code{{$data->quiz->id}}">{{$answerE->answer}}</label>
                    @endif
                </td>
            </tr>
        </table>
        @php $i++ @endphp
        @endforeach
        <div style="text-align:right; margin-bottom:3%;">
            <a href="{{url('my_proggress')}}" type="button" class="btn btn-primary btn-learn" style="background-color: #0ECDCD; border-color:#0ECDCD; width:150px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); font-size:18px; ">
                Back
            </a>
        </div>
    </div>
</section>
@endsection