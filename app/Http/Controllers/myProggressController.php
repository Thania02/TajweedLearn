<?php

namespace App\Http\Controllers;

use App\Models\quizModel;
use App\Models\User;
use App\Models\userSolveQuizModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class myProggressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $data = userSolveQuizModel::where('user_id', $userId)->groupBy('task_code')->orderBy('created_at', 'desc')->get();
        $total_user_solve_quizphase_1 = DB::table('user_solve_quiz')
            ->join('quiz', 'user_solve_quiz.quiz_id', '=', 'quiz.id')
            ->select('user_solve_quiz.*')
            ->where('user_id', $userId)
            ->where('quiz.quiz_type', 'quiz phase 1')
            ->groupBy('user_solve_quiz.task_code')
            ->orderBy('user_solve_quiz.created_at', 'desc')
            ->get();
        $total_user_solve_quizphase_2 = DB::table('user_solve_quiz')
            ->join('quiz', 'user_solve_quiz.quiz_id', '=', 'quiz.id')
            ->select('user_solve_quiz.*')
            ->where('user_id', $userId)
            ->where('quiz.quiz_type', 'quiz phase 2')
            ->groupBy('user_solve_quiz.task_code')
            ->orderBy('user_solve_quiz.created_at', 'desc')
            ->get();
        $total_quiz_phase1 = quizModel::where('quiz_type', 'quiz phase 1')->orderBy('created_at', 'desc')->count();
        $total_quiz_phase2 = quizModel::where('quiz_type', 'quiz phase 2')->orderBy('created_at', 'desc')->count();
        $quis_phase_1 = DB::table('user_solve_quiz')
            ->join('quiz', 'user_solve_quiz.quiz_id', '=', 'quiz.id')
            ->selectRaw('COUNT(user_solve_quiz.task_code) as jumlah_answer_benar')
            ->where('user_id', $userId)
            ->where('user_solve_quiz.status', 'true')
            ->where('quiz.quiz_type', 'quiz phase 1')
            ->groupBy('user_solve_quiz.task_code')
            ->orderBy('user_solve_quiz.created_at', 'desc')
            ->get();
        $quis_phase_2 = DB::table('user_solve_quiz')
            ->join('quiz', 'user_solve_quiz.quiz_id', '=', 'quiz.id')
            ->selectRaw('COUNT(user_solve_quiz.task_code) as jumlah_answer_benar')
            ->where('user_id', $userId)
            ->where('user_solve_quiz.status', 'true')
            ->where('quiz.quiz_type', 'quiz phase 2')
            ->groupBy('user_solve_quiz.task_code')
            ->orderBy('user_solve_quiz.created_at', 'desc')
            ->get();
        return view('pages.data-user.proggress.proggress', [
            'title' => 'My Proggress',
            'data'  => $data,
            'jumlah_pengerjaan' => $data,
            'quis_phase_1' => $quis_phase_1,
            'quis_phase_2' => $quis_phase_2,
            'total_quiz_phase1' => $total_quiz_phase1,
            'total_quiz_phase2' => $total_quiz_phase2,
            'total_user_solve_quizphase_1' => $total_user_solve_quizphase_1,
            'total_user_solve_quizphase_2' => $total_user_solve_quizphase_2
        ]);
    }

    public function result_quiz($id)
    {
        $data = userSolveQuizModel::where('task_code', $id)->orderBy('created_at', 'desc')->get();
        return view('pages.data-user.quiz.result_quiz', [
            'title' => 'My Proggress',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
