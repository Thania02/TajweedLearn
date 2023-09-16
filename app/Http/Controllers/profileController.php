<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('id', Auth::user()->id)->first();
        return view('pages.data-user.profile.profile', [
            'title' => 'Profile',
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
        $data = User::find($id);
        if (Auth::user()->level == 'admin') {
            return view('pages.data-admin.edit-profile', [
                'title' => 'Profile',
                'data' => $data
            ]);
        } else {
            return view('pages.data-user.profile.profile-edit', [
                'title' => 'Profile',
                'data' => $data
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
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if ($request->password != null) {
            $data->password = Hash::make($request->password);
        }

        if ($request->hasfile('photo')) {
            $image = $request->file('photo');
            $destination = 'assets/profile/' . $data->photo;
            if ($data->photo !== "profile.png") {
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
            $file_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/profile/'), $file_image);
            $data->photo = $file_image;
        }

        $data->update();

        if ($data) {
            return redirect()->back()->with('success', 'Profile Successfully Updated');
        }
    }

    public function edit_profile_proses(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        if ($request->password != null) {
            $data->password = Hash::make($request->password);
        }

        if ($request->hasfile('photo')) {
            $image = $request->file('photo');
            $destination = 'assets/profile/' . $data->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/profile/'), $file_image);
            $data->photo = $file_image;
        }

        $data->update();

        if ($data) {
            return redirect('profile/' . $id)->with('success', 'Profile Successfully Updated');
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
        //
    }
}
