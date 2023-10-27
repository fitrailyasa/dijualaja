<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function verif()
    {
        $users = User::where('roles_id', 99)->get();
        return view('admin.user.verif', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|max:255',
                'email' => 'required|max:255|unique:users,email',
                'no_telepon' => 'required',
                'password' => 'required',
                'roles_id' => 'required'
            ],
            [
                'nama.required' => 'Nama harus diisi!',
                'nama.max' => 'Nama maksimal 255 karakter!',
                'email.required' => 'Email harus diisi!',
                'email.max' => 'Email maksimal 255 karakter!',
                'email.unique' => 'Email sudah terdaftar!',
                'no_telepon.required' => 'No Telepon harus diisi!',
                'password.required' => 'Password harus diisi!',
                'roles_id.required' => 'Roles harus diisi!'
            ]
        );
        
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'password' => Hash::make($request->password),
            'roles_id' => $request->roles_id
        ]);

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/user')->with('sukses', 'Berhasil Tambah Data!');
        }
    }

    public function show(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.user.read', compact('user'));
    }

    public function edit(string $id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->first();
        return view('admin.user.update', compact('user', 'roles'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::where('id', auth()->user()->id )->firstOrFail();
        if($request->password == null){
            $user->update(
                [
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'no_telepon' => $request->no_telepon,
                ],[
                    'nama.required' => 'Nama harus diisi!',
                    'nama.max' => 'Nama maksimal 255 karakter!',
                    'email.required' => 'Email harus diisi!',
                    'email.max' => 'Email maksimal 255 karakter!',
                    'email.unique' => 'Email sudah terdaftar!',
                    'no_telepon.required' => 'No Telepon harus diisi!',
                ]
            );
        } else {
            $user->update(
                [
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'no_telepon' => $request->no_telepon,
                    'password' => Hash::make($request->password)
                ],[
                    'nama.required' => 'Nama harus diisi!',
                    'nama.max' => 'Nama maksimal 255 karakter!',
                    'email.required' => 'Email harus diisi!',
                    'email.max' => 'Email maksimal 255 karakter!',
                    'email.unique' => 'Email sudah terdaftar!',
                    'no_telepon.required' => 'No Telepon harus diisi!',
                    'password.required' => 'Password harus diisi!',
                    'password.min' => 'Password minimal 8 karakter!',
                    'password.confirmed' => 'Password tidak sama!',
                ]
            );
        }
        $validasi = $request->validate(
            [
                'gambar_user' => 'mimes:jpg,bmp,png,svg,jpeg,heif,hevc|max:10240 ',
            ],
            [
                'gambar_user.mimes' => 'Gambar harus berformat jpg, bmp, png, svg, jpeg, heif, hevc!',
                'gambar_user.max' => 'Gambar maksimal 10MB!',
            ]
        );

        if($request->hasFile('gambar_user')){
            $gambar_user = $validasi[('gambar_user')];
            $user->gambar_user = time().'_'.$gambar_user->getClientOriginalName();
            $user->update();
            $gambar_user->move('../public/assets/profile/',time().'_'.$gambar_user->getClientOriginalName());
        }

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/user')->with('sukses', 'Berhasil Edit Data!');
        }
    }

    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        if (auth()->user()->roles_id == 1) {
            return redirect('admin/user')->with('sukses', 'Berhasil Hapus Data!');
        }
    }
}
