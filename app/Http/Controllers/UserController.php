<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $title      = 'Daftar User';
        $data      = User::all();

        return view('pages.users.index', compact('title', 'data'));
    }

    public function create()
    {
        $title = 'Halaman Tambah User';

        return view('pages.users.create', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'level_user' => 'required',
            'username'  => 'required',
        ]);

        try {

            $user = new User();
            $user->nama             = $request->nama;
            $user->username         = $request->username;
            $user->email            = $request->email;
            $user->level_user       = $request->level_user;
            $user->password         = bcrypt($request->password);
            $user->save();

            return redirect()->route('users.index')->with('success', 'Data user berhasil ditambahkan');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $title = 'Edit User';
        $user = User::find($id);

        return view('pages.users.edit', compact('title', 'user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'          => 'required',
            'email'         => 'required',
            'level_user'    => 'required',
            'username'      => 'required',
        ]);

        try {

            $user = User::find($id);
            $user->nama             = $request->nama;
            $user->username         = $request->username;
            $user->email            = $request->email;
            $user->level_user       = $request->level_user;
            $user->save();
            return redirect()->route('users.index')->with('success', 'Data user berhasil diubah');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect()->back()->with('success', 'Data user berhasil dihapus');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function editPassword()
    {

        $title = 'Edit Password';

        return view('pages.users.edit_password', compact('title'));
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password'  => 'required',
            'new_password'  => 'required',
        ]);

        try {

            $user = User::find(auth()->user()->id);

            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->with('error', 'Password lama tidak sesuai');
            }

            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Password user berhasil diubah');
        } catch (\Exception $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
