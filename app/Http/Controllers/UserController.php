<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::all()->sortByDesc('created_at');
        return view('pages.data-admin.user.user', [
            'title' => 'Data User',
            'users' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.data-admin.user.user-tambah', [
            'title' => 'Data User',
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'level' => ['required', 'string', 'max:255'],
        ]);

        $data = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => 'profile.png',
            'level' => $request->level,
        ]);

        if ($data) {
            return redirect('users')->with('success', 'User data added successfully');
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
        $data = User::find($id);
        return view('pages.data-admin.user.user-edit', [
            'title' => 'Edit Data User',
            'data' => $data
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
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->level = $request->level;


        if ($request->hasfile('photo')) {
            $image = $request->file('photo');
            $destination = 'assets/profile/' . $data->photo;
            if ($data->photo != 'profile.png') {
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
            return redirect('users')->with('success', 'User data Added successfully');
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
        $data = User::find($id);
        $location = 'assets/profile/' . $data->photo;
        if ($data->photo != 'profile.png') {
            if (File::exists($location)) {
                File::delete($location);
            }
        }
        $data->delete();

        if ($data) {
            return redirect('users')->with('success', 'User data successfully deleted');
        }
    }

    public function forgot()
    {
        return view('auth.forgot', [
            'title' => 'Forgot Password',
        ]);
    }

    public function forgot_proses(Request $request)
    {
        $user = User::where('username', $request->username)->first();
        if ($user) {
            return redirect()->route('reset', $user->id);
        } else {
            return redirect()->route('forgot')->with('warning', 'Username not found, please input correct username');
        }
    }

    public function reset($id)
    {
        return view('auth.reset', [
            'title' => 'Forgot Password',
            'id' => $id
        ]);
    }

    public function reset_proses(Request $request)
    {
        $id = $request->id;
        if ($request->password != $request->password_confirmation) {
            return redirect()->route('reset', $id)->with('warning', 'password and confirm password isn`t same');
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->update();
            return redirect()->route('login')->with('success', 'Reset password Successfully');
        }
    }
}
