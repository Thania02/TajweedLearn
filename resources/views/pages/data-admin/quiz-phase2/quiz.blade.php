@extends('layouts.sidebar')

@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card mb-3">
            <div class="card-body">
                <button class="btn btn-success" onclick="show('<?= route('quiz_phase2.create') ?>')"><i class="fas fa-plus"></i></i>&nbsp; Add Data</button>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Question</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach($data as $data)
                        <tr>
                            <td style="width: 30px;">{{ $i++ }}</td>
                            <td>{{ $data->question}}</td>
                            <td style="width: 250px;">
                                <a class="btn btn-warning btn-sm mt-1" href="{{route('quiz_phase2.show', $data->id)}}"><i class="fas fa-eye"></i>&nbsp;&nbsp;Detail</a>
                                <a class="btn btn-info btn-sm mt-1" href="{{route('quiz_phase2.edit', $data->id)}}"><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;Edit</a>
                                <a class="btn btn-danger btn-sm mt-1" onclick="notificationforDelete(event, this)" href="{{route('quiz_phase2.destroy',$data->id)}}"><i class="fas fa-trash"></i>&nbsp;&nbsp; Delete</a>
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