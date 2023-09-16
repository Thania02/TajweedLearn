@extends('layouts.sidebar')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card mb-3">
            <div class="card-body">
                <form method="POST" action="{{ route('quiz_phase1.update',$data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputquestion">Question</label>
                        <input type="text" class="form-control" id="exampleInputquestion" name="question" value="{{$data->question}}" placeholder="Input Question" required>
                    </div>
                    <audio src="{{url('assets/quiz/'.$data->file)}}" controls></audio>
                    <div class="form-group">
                        <label for="exampleInputFile">Input File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" name="file" id="exampleInputFile">
                            </div>
                        </div>
                    </div>
                    <img width="12%" src="{{url('assets/quiz/'. $answerA->answer)}}" alt="">
                    <div class="form-group">
                        <label for="exampleInputanswerA">Answer A</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" name="fileA" id="exampleInputanswerA">
                            </div>
                        </div>
                    </div>
                    <img width="12%" src="{{url('assets/quiz/'. $answerB->answer)}}" alt="">
                    <div class="form-group">
                        <label for="exampleInputanswerB">Answer B</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" name="fileB" id="exampleInputanswerB">
                            </div>
                        </div>
                    </div>
                    <img width="12%" src="{{url('assets/quiz/'. $answerC->answer)}}" alt="">
                    <div class="form-group">
                        <label for="exampleInputanswerC">Answer C</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" name="fileC" id="exampleInputanswerC">
                            </div>
                        </div>
                    </div>
                    <img width="12%" src="{{url('assets/quiz/'. $answerD->answer)}}" alt="">
                    <div class="form-group">
                        <label for="exampleInputanswerA">Answer D</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" name="fileD" id="exampleInputanswerD">
                            </div>
                        </div>
                    </div>
                    <img width="12%" src="{{url('assets/quiz/'. $answerE->answer)}}" alt="">
                    <div class="form-group">
                        <label for="exampleInputanswerA">Answer E</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" name="fileE" id="exampleInputanswerE">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputanswerBenar">Correct Answer</label>
                        <select class="custom-select rounded-0" id="exampleInputanswerBenar" name="answer_benar" required>
                            <option value="">--- Choose Answer ---</option>
                            <option value="A" {{($data->answer_benar == 'A') ? 'selected' : ''}}>A</option>
                            <option value="B" {{($data->answer_benar == 'B') ? 'selected' : ''}}>B</option>
                            <option value="C" {{($data->answer_benar == 'C') ? 'selected' : ''}}>C</option>
                            <option value="D" {{($data->answer_benar == 'D') ? 'selected' : ''}}>D</option>
                            <option value="E" {{($data->answer_benar == 'E') ? 'selected' : ''}}>E</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection