@extends('layouts.sidebar')

@section('content')
@foreach($errors->all() as $error)
<script>
    Swal.fire({
        icon: 'error',
        title: '<?= $error ?>',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endforeach
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card mb-3">
            <div class="card-body">
                <form method="POST" action="{{ route('users.update',$data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputNama">Name</label>
                        <input type="text" class="form-control" id="exampleInputNama" name="name" placeholder="Input Name" required value="{{$data->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail" name="email" placeholder="Input Email" required value="{{$data->email}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername">Username</label>
                        <input type="text" class="form-control" id="exampleInputUsername" name="username" placeholder="Input Username" required value="{{$data->username}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputlevel">level</label>
                        <select class="custom-select rounded-0" id="exampleInputlevel" name="level" required>
                            <option value="">--- Choose level ---</option>
                            <option value="student" {{($data->level == 'student') ? 'selected' : ''}}>student</option>
                            <option value="admin" {{($data->level == 'admin') ? 'selected' : ''}}>admin</option>
                        </select>
                    </div>
                    <img width="100" height="100" src="{{url('assets/profile/'.$data->photo)}}" alt="">
                    <div class="form-group">
                        <label for="exampleInputFile">Input Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="photo" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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