<?php

namespace App\Http\Controllers;

use App\Models\learnTajwidDetailModel;
use App\Models\learnTajwidModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class learnTajwidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->level == 'admin') {
            $data = learnTajwidModel::orderBy('created_at', 'asc')->get();
            return view('pages.data-admin.learn_tajwid.learn', [
                'title' => 'Tajweed Learn',
                'data' => $data
            ]);
        } else {
            $data = learnTajwidModel::groupBy('type_learn')->orderBy('created_at', 'asc')->get();
            return view('pages.data-user.learn_tajwid.learn', [
                'title' => 'Tajweed Learn',
                'data' => $data
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
        return view('pages.data-admin.learn_tajwid.learn-tambah', [
            'title' => 'Tajweed Learn',
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
        if ($request->hasFile('sound')) {
            $sound = $request->file('sound');
            $new_sound = rand() . '.' . $sound->getClientOriginalExtension();
            $sound->move(public_path('assets/learn'), $new_sound);

            $data = learnTajwidModel::create([
                'id' => $id,
                'title' => $request->title,
                'type_learn' => $request->type_learn,
                'description' => $request->description,
                'sound' => $new_sound
            ]);
        } else {
            $data = learnTajwidModel::create([
                'id' => $id,
                'title' => $request->title,
                'type_learn' => $request->type_learn,
                'description' => $request->description,
            ]);
        }


        if ($request->hasFile('example')) {
            $example = $request->file('example');
            foreach ($example as $fileExample) {
                // echo $fileExample . '<br>';
                $extension = $fileExample->getClientOriginalExtension();
                $rand = Str::random(5);
                $rand1 = Str::random(3);
                $fileExampleName = $rand . "-" . date('his') . "-" . $rand1 . "." . $extension;
                $destinationPath = 'assets/learn' . '/';
                $fileExample->move($destinationPath, $fileExampleName);

                learnTajwidDetailModel::create([
                    'learn_tajwid_id' =>  $id,
                    'letter' =>  null,
                    'example' =>  $fileExampleName,
                ]);
            }
        }

        if ($request->hasFile('letter')) {
            $letter = $request->file('letter');
            foreach ($letter as $file) {
                $extension = $file->getClientOriginalExtension();
                $rand = Str::random(5);
                $rand1 = Str::random(3);
                $fileName = $rand . "-" . date('his') . "-" . $rand1 . "." . $extension;
                $destinationPath = 'assets/learn' . '/';
                $file->move($destinationPath, $fileName);

                learnTajwidDetailModel::create([
                    'learn_tajwid_id' =>  $id,
                    'letter' =>  $fileName,
                ]);
            }
        }

        if ($data) {
            return redirect('learn_tajwid')->with('success', 'Data Tajweed Learn Added Successfully');
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
        if (Auth::user()->level == 'admin') {
            $data = learnTajwidModel::find($id);
            $example = learnTajwidDetailModel::where('learn_tajwid_id', $id)->where('example', '!=', 'null')->get();
            $letter = learnTajwidDetailModel::where('learn_tajwid_id', $id)->where('letter', '!=', 'null')->get();

            return view('pages.data-admin.learn_tajwid.learn-detail', [
                'title' => 'Tajweed Learn',
                'data' => $data,
                'example' => $example,
                'letter' => $letter
            ]);
        } else {
            $data = learnTajwidModel::where('type_learn', $id)->orderBy('created_at', 'asc')->get();
            $data_awal = learnTajwidModel::where('type_learn', $id)->orderBy('created_at', 'asc')->first();
            return view('pages.data-user.learn_tajwid.learn-detail', [
                'title' => 'Tajweed Learn',
                'data' => $data,
                'data_awal' => $data_awal
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = learnTajwidModel::find($id);
        $example = learnTajwidDetailModel::where('learn_tajwid_id', $id)->where('example', '!=', 'null')->get();
        $letter = learnTajwidDetailModel::where('learn_tajwid_id', $id)->where('letter', '!=', 'null')->get();
        return view('pages.data-admin.learn_tajwid.learn-edit', [
            'title' => 'Edit Tajweed Learn',
            'data' => $data,
            'example' => $example,
            'letter' => $letter
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
        $data = learnTajwidModel::find($id);
        $data->title =  $request->title;
        $data->type_learn = $request->type_learn;
        $data->description =  $request->description;

        if ($request->hasfile('sound')) {
            $sound = $request->file('sound');
            $destination = 'assets/learn/' . $data->sound;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file_sound = rand() . '.' . $sound->getClientOriginalExtension();
            $sound->move(public_path('assets/learn/'), $file_sound);
            $data->sound = $file_sound;
        }
        $data->update();

        if ($request->hasFile('example')) {
            $example = $request->file('example');
            foreach ($example as $fileExample) {
                $extension = $fileExample->getClientOriginalExtension();
                $rand = Str::random(5);
                $rand1 = Str::random(3);
                $fileExampleName = $rand . "-" . date('his') . "-" . $rand1 . "." . $extension;
                $destinationPath = 'assets/learn' . '/';
                $fileExample->move($destinationPath, $fileExampleName);

                learnTajwidDetailModel::create([
                    'learn_tajwid_id' =>  $id,
                    'example' =>  $fileExampleName,
                ]);
            }
        }

        if ($request->hasFile('letter')) {
            $letter = $request->file('letter');
            foreach ($letter as $fileLetter) {
                $extension = $fileLetter->getClientOriginalExtension();
                $rand = Str::random(5);
                $rand1 = Str::random(3);
                $fileLetterName = $rand . "-" . date('his') . "-" . $rand1 . "." . $extension;
                $destinationPath = 'assets/learn' . '/';
                $fileLetter->move($destinationPath, $fileLetterName);

                learnTajwidDetailModel::create([
                    'learn_tajwid_id' =>  $id,
                    'letter' =>  $fileLetterName,
                ]);
            }
        }

        if ($data) {
            return redirect('learn_tajwid')->with('success', 'Data Tajweed Learn Successfully Updated');
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
        $data = learnTajwidModel::find($id);
        $data_detail_learn = learnTajwidDetailModel::where('learn_tajwid_id', $id)->get();
        $location = 'assets/learn/' . $data->sound;
        if (File::exists($location)) {
            File::delete($location);
        }

        foreach ($data_detail_learn as $data_detail) {
            $location_example = 'assets/learn/' . $data_detail->example;
            if (File::exists($location_example)) {
                File::delete($location_example);
            }
            $location_letter = 'assets/learn/' . $data_detail->letter;
            if (File::exists($location_letter)) {
                File::delete($location_letter);
            }
        }

        $data->delete();
        if ($data) {
            return redirect('learn_tajwid')->with('success', 'Data Tajweed Learn Successfully Deleted');
        }
    }

    public function Delete_learn($id)
    {
        $id = explode('-', $id);
        $data = learnTajwidDetailModel::find($id[0]);
        if ($data->example != null) {
            $location_example = 'assets/learn/' . $data->example;
            if (File::exists($location_example)) {
                File::delete($location_example);
            }
        } else {
            $location_letter = 'assets/learn/' . $data->letter;
            if (File::exists($location_letter)) {
                File::delete($location_letter);
            }
        }
        $data->delete();
        return redirect()->route('learn_tajwid.edit', $id[1]);
    }
}
