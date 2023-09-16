@extends('layouts.sidebar')

@section('content')
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
        <h4 style="text-align:center;">read the task and choose the correct answers!</h4>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <table>
            <tr>
                <td style="width: 5%; padding:20px;">
                    <p style="padding:10px; padding-left:20px; height:50px; width:50px; background-color:#0ECDCD; border-radius:100%; color:#fff; font-weight:bold; font-size:20px;">1</p>
                </td>
                <td>
                    <img src="{{url('assets/quiz/'.$data->file)}}" width="15%">
                    <h5 style="margin-left:10px;">{{$data->question}}</h5>.
                </td>
            </tr>
            @foreach($data->quizDetail as $data)
            <tr>
                <td></td>
                <td>
                    <input type="radio" id="answer_code" name="options" value="{{$data->answer_code}}">
                    <label for="option1">{{$data->answer}}</label>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</section>
@endsection