@extends('layouts.topnav')

@php
$subtitle = '';
@endphp

@section('content')
<section class="content">
    <div class="container-fluid">
        <h2 style="text-align:center; font-weight:bold; margin-top:15px;">Tajweed Learn</h2>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
        @php $i = 1; @endphp
        @foreach($data as $data)
        <div class="{{($data->id == $data_awal->id) ? '' : 'd-none' }} learn">
            <h4 style="margin-top: 25px;">{{$i}}. {{$data->title}}</h4>
            <div class="card mt-2" style="border:1px solid #000000; margin-top:-15px; border-radius:25px;">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="container-fluid">
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
                        <?php
                        $example = App\Models\learnTajwidDetailModel::where('learn_tajwid_id', $data->id)->where('example', '!=', 'null')->get();
                        $letter = App\Models\learnTajwidDetailModel::where('learn_tajwid_id', $data->id)->where('letter', '!=', 'null')->get();
                        ?>
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
        @php $i++ @endphp
        @endforeach
        <div style="text-align:right;">
            <a type="button" class="btn btn-primary prevBtn d-none" style="background-color: #3E718E; border-color:#3E718E; width:150px; font-weight:bold; font-size:18px; ">
                Previous
            </a>
            <a type="button" class="btn btn-primary nextBtn" style="background-color: #3E718E; border-color:#3E718E; width:150px; font-weight:bold; font-size:18px; ">
                Next
            </a>
        </div>

        <script>
            let i = 0;
            $(".prevBtn").on("click", function() {
                if (i > 0) {
                    let x = i - 1;
                    $(".learn").eq(i).addClass("d-none");
                    $(".learn").eq(x).removeClass("d-none");
                    $(".prevBtn").removeClass("d-none");
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
                    $(".learn").eq(i).addClass("d-none");
                    $(".learn").eq(x).removeClass("d-none");
                    $(".prevBtn").removeClass("d-none");
                    i++;
                }

                if (i == <?= $i - 2 ?>) {
                    $(".prevBtn").removeClass("d-none");
                    $(".nextBtn").addClass("d-none");
                }
            });
        </script>
    </div>
</section>
@endsection