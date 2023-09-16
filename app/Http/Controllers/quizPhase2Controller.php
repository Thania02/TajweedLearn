<?php

namespace App\Http\Controllers;

use App\Models\quizDetailModel;
use App\Models\quizModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class quizPhase2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->level == 'admin') {
            $data = quizModel::where('quiz_type', 'quiz phase 2')->orderBy('created_at', 'desc')->get();
            return view('pages.data-admin.quiz-phase2.quiz', [
                'title' => 'Quiz Phase 2',
                'data' => $data
            ]);
        } else {
            $data = quizModel::where('quiz_type', 'quiz phase 2')->orderBy('created_at', 'desc')->get();
            $data_awal = quizModel::where('quiz_type', 'quiz phase 2')->orderBy('created_at', 'desc')->first();
            return view('pages.data-user.quiz.quiz-phase2', [
                'title' => 'Quiz Phase 2',
                'data' => $data,
                'data_awal' => $data_awal
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.data-admin.quiz-phase2.quiz-tambah', [
            'title' => 'Quiz Phase 2',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = mt_rand(1000, 99999);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $new_file = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/quiz'), $new_file);

            $data = quizModel::create([
                'id' => $id,
                'file' => $new_file,
                'question' => $request->question,
                'quiz_type' => 'quiz phase 2',
                'answer_benar' => $request->answer_benar,
            ]);
        } else {
            $data = quizModel::create([
                'id' => $id,
                'question' => $request->question,
                'quiz_type' => 'quiz phase 2',
                'answer_benar' => $request->answer_benar,
            ]);
        }


        if ($request->answerA != null) {
            quizDetailModel::create([
                'quiz_id' =>  $id,
                'answer_code' =>  'A',
                'answer' =>  $request->answerA,
            ]);
        }

        if ($request->answerB != null) {
            quizDetailModel::create([
                'quiz_id' =>  $id,
                'answer_code' =>  'B',
                'answer' =>  $request->answerB,
            ]);
        }

        if ($request->answerC != null) {
            quizDetailModel::create([
                'quiz_id' =>  $id,
                'answer_code' =>  'C',
                'answer' =>  $request->answerC,
            ]);
        }

        if ($request->answerD != null) {
            quizDetailModel::create([
                'quiz_id' =>  $id,
                'answer_code' =>  'D',
                'answer' =>  $request->answerD,
            ]);
        }

        if ($request->answerE != null) {
            quizDetailModel::create([
                'quiz_id' =>  $id,
                'answer_code' =>  'E',
                'answer' =>  $request->answerE,
            ]);
        }

        if ($data) {
            return redirect('quiz_phase2')->with('success', 'Quiz Phase 1 data added successfully');
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
        $data = quizModel::find($id);
        return view('pages.data-admin.quiz-phase2.quiz-detail', [
            'title' => 'Quiz Phase 2',
            'data' => $data
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
        $data = quizModel::find($id);
        $answerA = quizDetailModel::where('quiz_id', $id)->where('answer_code', 'A')->first();
        $answerB = quizDetailModel::where('quiz_id', $id)->where('answer_code', 'B')->first();
        $answerC = quizDetailModel::where('quiz_id', $id)->where('answer_code', 'C')->first();
        $answerD = quizDetailModel::where('quiz_id', $id)->where('answer_code', 'D')->first();
        $answerE = quizDetailModel::where('quiz_id', $id)->where('answer_code', 'E')->first();
        return view('pages.data-admin.quiz-phase2.quiz-edit', [
            'title' => 'Edit Quiz Phase 2',
            'data' => $data,
            'answerA' => $answerA,
            'answerB' => $answerB,
            'answerC' => $answerC,
            'answerD' => $answerD,
            'answerE' => $answerE,
        ]);
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

        $data = quizModel::find($id);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $destination = 'assets/quiz/' . $data->file;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file_file = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/quiz/'), $file_file);
            $data->file = $file_file;
        }
        $data->question = $request->question;
        $data->answer_benar = $request->answer_benar;
        $data->update();

        if ($request->answerA != null) {
            quizDetailModel::where('quiz_id', $id)->where('answer_code', 'A')->update([
                'quiz_id' =>  $id,
                'answer_code' =>  'A',
                'answer' =>  $request->answerA,
            ]);
        }

        if ($request->answerB != null) {
            quizDetailModel::where('quiz_id', $id)->where('answer_code', 'B')->update([
                'quiz_id' =>  $id,
                'answer_code' =>  'B',
                'answer' =>  $request->answerB,
            ]);
        }

        if ($request->answerC != null) {
            quizDetailModel::where('quiz_id', $id)->where('answer_code', 'C')->update([
                'quiz_id' =>  $id,
                'answer_code' =>  'C',
                'answer' =>  $request->answerC,
            ]);
        }

        if ($request->answerD != null) {
            quizDetailModel::where('quiz_id', $id)->where('answer_code', 'D')->update([
                'quiz_id' =>  $id,
                'answer_code' =>  'D',
                'answer' =>  $request->answerD,
            ]);
        }

        if ($request->answerE != null) {
            quizDetailModel::where('quiz_id', $id)->where('answer_code', 'E')->update([
                'quiz_id' =>  $id,
                'answer_code' =>  'E',
                'answer' =>  $request->answerE,
            ]);
        }


        if ($data) {
            return redirect('quiz_phase2')->with('success', 'Quiz Phase 2 Data Successfully Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = quizModel::find($id);
        $location = 'assets/quiz/' . $data->file;
        if (File::exists($location)) {
            File::delete($location);
        }
        $data->delete();

        if ($data) {
            return redirect('quiz_phase2')->with('success', 'Quiz Phase 2 data successfully deleted');
        }
    }
}
