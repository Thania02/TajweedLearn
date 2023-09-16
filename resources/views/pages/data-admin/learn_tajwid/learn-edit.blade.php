@extends('layouts.sidebar')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card mb-3">
            <div class="card-body">
                <form method="POST" action="{{ route('learn_tajwid.update',$data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputtitle">Titles</label>
                        <input type="text" class="form-control" id="exampleInputtitle" name="title" name placeholder="Input Titles" value="{{$data->title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLearn">Type Learn</label>
                        <select class="custom-select rounded-0" id="exampleInputLearn" name="type_learn" required>
                            <option value="">--- Choose Type ---</option>
                            <option value="Qalqalah" {{($data->type_learn == 'Qalqalah') ? 'selected' : ''}}>Qalqalah</option>
                            <option value="Idgham" {{($data->type_learn == 'Idgham') ? 'selected' : ''}}>Idgham</option>
                            <option value="Madd" {{($data->type_learn == 'Madd') ? 'selected' : ''}}>Madd</option>
                            <option value="Alif Lam Ma`rifah" {{($data->type_learn == 'Alif Lam Ma`rifah') ? 'selected' : ''}}>Alif Lam Ma`rifah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputdescription">Description</label>
                        <textarea class="form-control" id="exampleInputdescription" rows="4" placeholder="Description" name="description">{{$data->description}}"</textarea>
                    </div>
                    <div style="display:flex; ">
                        @foreach($example as $dataexample)
                        <span style="text-align:center;"><img src="{{url('assets/learn/'.$dataexample->example)}}" alt="" width="50%"><br><a href="{{url('Delete_learn/'.$dataexample->id.'-'.$data->id)}}" class="text-danger">Delete</a></span>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleInputExample">Input Example</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" multiple name="example[]" id="exampleInputExample">
                            </div>
                        </div>
                    </div>
                    <div style="display:flex; text-align:left;">
                        @foreach($letter as $dataLetter)
                        <span style="text-align:center;"><img src="{{url('assets/learn/'.$dataLetter->letter)}}" alt="" width="50%"><br><a href="{{url('Delete_learn/'.$dataLetter->id.'-'.$data->id)}}" class="text-danger">Delete</a></span>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLetter">Input Letter</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" multiple name="letter[]" id="exampleInputLetter">
                            </div>
                        </div>
                    </div>
                    <audio src="{{url('assets/learn/'.$data->sound)}}" controls></audio>
                    <div class="form-group">
                        <label for="exampleInputFile">Input Sound</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" name="sound" id="exampleInputFile">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection