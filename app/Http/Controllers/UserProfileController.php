<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function edit(string $id)
    {
        $user = User::where('id', auth()->user()->id )->firstOrFail();
        return view('profile.update', compact('user'));
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

        if ($request->hasFile('gambar_user')) {
            $gambar_user = $request->file('gambar_user');
            $nama_file = time() . '_' . $gambar_user->getClientOriginalName();
            $user->gambar_user = $nama_file;
            $user->update();
            $gambar_user->move(public_path('assets/profile/'), $nama_file);
        }

        return redirect('profile/'.$id.'/edit')->with('sukses', 'Berhasil Edit Data!');
    }

}
