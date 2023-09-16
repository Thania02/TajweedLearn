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
                <button class="btn btn-success" onclick="show('<?= route('learn_tajwid.create') ?>')"><i class="fas fa-plus"></i></i>&nbsp; Add Data</button>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Titles</th>
                            <th>Type Learn</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($data as $data)
                        <tr>
                            <td style="width: 30px;">{{ $i++ }}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->type_learn }}</td>
                            <td style="width: 250px;">
                                <a class="btn btn-warning btn-sm mt-1" href="{{route('learn_tajwid.show', $data->id)}}"><i class="fas fa-eye"></i>&nbsp;&nbsp;Detail</a>
                                <a class="btn btn-info btn-sm mt-1" href="{{route('learn_tajwid.edit', $data->id)}}"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit</a>
                                <a class="btn btn-danger btn-sm mt-1" onclick="notificationforDelete(event, this)" href="{{route('learn_tajwid.destroy',$data->id)}}"><i class="fas fa-trash"></i>&nbsp;&nbsp; Delete</a>
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