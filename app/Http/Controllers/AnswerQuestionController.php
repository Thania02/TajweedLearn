<?php

namespace App\Http\Controllers;

use App\Models\quizDetailModel;
use App\Models\quizModel;
use App\Models\userSolveQuizModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $quiz_type = $request->quiz_type;
        $task_code = "Q-" . mt_rand(1000, 99999);
        if ($quiz_type == "quiz phase 1") {
            $quiz = quizModel::where('quiz_type', 'quiz phase 1')->orderBy('created_at', 'desc')->get();
            foreach ($quiz as $quis) {
                $getInput = "options_question" . "_" . $quis->id;
                $answer = $request->$getInput;
                $status = ($answer == $quis->answer_benar) ? "true" : "false";
                userSolveQuizModel::create([
                    "user_id" => Auth::user()->id,
                    "quiz_id" => $quis->id,
                    "task_code" => $task_code,
                    "answer" => $answer,
                    "status" => $status,
                    'date' => date('Y-m-d')
                ]);
            }
            return redirect()->route("finish.show", "QP1~" . $task_code);
        } else {
            $quiz = quizModel::where('quiz_type', 'quiz phase 2')->orderBy('created_at', 'desc')->get();
            foreach ($quiz as $quis) {
                $getInput = "options_question" . "_" . $quis->id;
                $answer = $request->$getInput;
                $status = ($answer == $quis->answer_benar) ? "true" : "false";
                userSolveQuizModel::create([
                    "user_id" => Auth::user()->id,
                    "quiz_id" => $quis->id,
                    "task_code" => $task_code,
                    "answer" => $answer,
                    "status" => $status,
                    'date' => date('Y-m-d')
                ]);
            }
            return redirect("finish/" . "QP2~" . $task_code);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kode = explode('~', $id);
        $jumlah_question_benar = userSolveQuizModel::where("task_code", $kode[1])->where('status', 'true')->count();
        if ($kode[0] == "QP1") {
            $jumlah_all_quiz = quizModel::where('quiz_type', 'quiz phase 1')->orderBy('created_at', 'desc')->count();
        } else {
            $jumlah_all_quiz = quizModel::where('quiz_type', 'quiz phase 1')->orderBy('created_at', 'desc')->count();
        }
        return view('pages.data-user.quiz.finish', [
            'title' => 'Finish',
            'jumlah_all_quiz' => $jumlah_all_quiz,
            'jumlah_question_benar' => $jumlah_question_benar,
            'task_code' => $kode[1]
        ]);
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
