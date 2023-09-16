@extends('layouts.sidebar')

@section('content')
<section class="content">
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <h4 style="margin-top: 25px; font-weight:bold;">{{$data->title}}</h4>
        <div class="card mt-2" style="border:1px solid #000000; margin-top:-15px; border-radius:25px;">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="container">
                    <h6 style="font-weight: bold;">Description</h6>
                    <p><?= $str = preg_replace("/\r?\n/", "<br>", $data->description); ?></p>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <table>
            <tr>
                <td>
                    <h6 style="font-weight: bold;">Example:</h6>
                </td>
                <td style="display: flex;">
                    @if(count($example) != 0)
                    @foreach($example as $detail)
                    <img src="{{url('assets/learn/'.$detail->example)}}" alt="" width="40%">
                    @endforeach
                    @else
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <h6 style="font-weight: bold;">Letter</h6>
                </td>
                <td>
                    @if(count($letter) != 0)
                    @foreach($letter as $detail)
                    <img src="{{url('assets/learn/'.$detail->letter)}}" alt="" width="35%">
                    @endforeach
                    @else
                    -
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <h6 style="font-weight: bold;">Sound:</h6>
                </td>
                <td>

                    @if($data->sound != null)
                    <audio src="{{url('assets/learn/'.$data->sound)}}" controls></audio>
                    @else
                    -
                    @endif
                </td>
            </tr>
        </table>
    </div>
</section>
@endsection