@extends('layouts.topnav')

@php
$subtitle = '';
@endphp

@section('content')
<section class="content">
    <div class="container-fluid">
        <h1 style="margin-left:16%; margin-top:5px;">Hi {{Auth::user()->name}} ! Welcome to Tajweed Learn</h1>
    </div>
    <!-- /.container-fluid -->
    <div class="container-fluid">
        <div class="card mt-4" style="background-color: rgba(1, 69, 106, 0.76); box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); color:#ffff;">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="container">
                    <h2 style="font-weight: bold; text-align:center;">My Proggress</h2>
                    <div class="chart">
                        <div style="min-height: 230px; height: 300px; max-height: 300px; max-width: 100%; background-color:#ffff;">
                            <canvas id="myChart2" style="min-height: 230px; height: 300px; max-height: 300px; max-width: 100%; background-color:#ffff;"></canvas>
                        </div>
                    </div>
                    <div class="card mt-4" style="background-color: #ffff;">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container-fluid">
                                <table width="100%" style="color: #000; font-size:18px">
                                    @foreach($data as $data)
                                    <tr>
                                        @if($data->quiz->quiz_type == "quiz phase 1" )
                                        <td width="95%">Quiz Phase 1<br>{{$data->date}}</td>
                                        @else
                                        <td width="95%">Quiz Phase 2<br>{{$data->date}}</td>
                                        @endif
                                        <td style="vertical-align: middle;"><a href="{{url('result_quiz/'.$data->task_code)}}" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

</section>
<script>
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                $data = null;
                if (count($total_user_solve_quizphase_1) > count($total_user_solve_quizphase_2)) {
                    $data = $total_user_solve_quizphase_1;
                } else if (count($total_user_solve_quizphase_1) < count($total_user_solve_quizphase_2)) {
                    $data = $total_user_solve_quizphase_2;
                } else {
                    $data = $total_user_solve_quizphase_1;
                }
                foreach ($data as $data) { ?> '',
                <?php } ?>
            ],
            datasets: [{
                label: 'True Answer Quiz Phase 1',
                data: [<?php foreach ($quis_phase_1 as $data_quis_phase_1) { ?> <?= $data_quis_phase_1->jumlah_answer_benar  ?>,
                    <?php } ?>
                ],
                backgroundColor: [
                    'rgba(60,141,188,1)'
                ],
                borderColor: [
                    'rgba(60,141,188, 1)',
                ],
                borderWidth: 1
            }, {
                label: 'True Answer Quiz Phase 2',
                data: [<?php foreach ($quis_phase_2 as $data) { ?> <?= $data->jumlah_answer_benar ?>,
                    <?php } ?>
                ],
                backgroundColor: [
                    'rgba(210, 214, 222, 1)'
                ],
                borderColor: [
                    'rgba(210, 214, 222, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection