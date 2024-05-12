<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SesiController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function login(){
        return view('login');
    }

    public function loginProses(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib di isi.',
            'password.required' => 'Password wajib di isi.'
        ]);

        $infoLogin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            return redirect('dashboard');
        }else {
            return redirect('login')->withErrors('Username atau Password tidak sesuai.')->withInput();
        }
    }

    public function registrasi(Request $request){
        // Check if password1 matches password2
        if ($request->password1 !== $request->password2) {
            return redirect()->back()->withInput()->withErrors(['password2' => 'The password confirmation does not match.']);
        }

        $validator = Validator::make($request->all(), [
            'nis' => 'required|min:5',
            'nama' => 'required|min:2',
            'username' => 'required|unique:users,username',
            'password1' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->errors()->first()); // Passing the first error message as a string
        }

        $data['nis'] = $request->nis;
        $data['nama'] = $request->nama;
        $data['username'] = $request->username;
        $data['password_login'] = $request->password1;
        $data['password'] = bcrypt($request->password1);

        User::create($data);

        // Redirect with a success message
        return redirect()->route('login')->with('success', 'Registrasi Berhasil!');
    }

    public function logout(){
        Auth::logout();
        return redirect('');
    }
}
