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
                <button class="btn btn-success" onclick="show('<?= route('users.create') ?>')"><i class="fas fa-plus"></i></i>&nbsp; Add Data</button>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($users as $data)
                        <tr>
                            <td style="width: 30px;">{{ $i++ }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->email }}</td>
                            <td><img alt="Avatar" width="50" src="{{url('assets/profile/',$data->photo)}}"></td>
                            <td>{{ $data->level }}</td>
                            <td style="width: 180px;">
                                <a class="btn btn-info btn-sm mt-1" href="{{route('users.edit', $data->id)}}"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit</a>
                                <a class="btn btn-danger btn-sm mt-1" onclick="notificationforDelete(event, this)" href="{{route('users.destroy',$data->id)}}"><i class="fas fa-trash"></i>&nbsp;&nbsp; Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection