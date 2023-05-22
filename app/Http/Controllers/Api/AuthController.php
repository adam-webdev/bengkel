<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\{Validator, Auth};

class AuthController extends BaseController
{
    public function register(Request $request)
    {
        $pesanError = [
            "name.required" => "Username wajib di isi!",
            "no_hp.required" => "Nomor hp wajib di isi!",
            "email.required" => "Email wajib di isi!",
            "email.email" => "Email tidak valid! ",
            "password.required" => "password wajib di isi!",
            // "password.min" => "Password minimal 6 huruf",
            // "confirm_password.required" => "konfirmasi password wajib di isi!",
            // "confirm_password" => "Konfirmasi password beda",
        ];

        $validator = Validator::make($request->all(), [
            "name" => "required",
            "no_hp" => "required",
            "email" => "required|email",
            "password" => "required",
            // "confirm_password" => "same:password"
        ], $pesanError);

        $exist_email = User::where('email', $request->email)->first();
        if ($exist_email) {
            return $this->error("Email sudah digunakan!");
        }
        if ($validator->fails()) {
            return $this->error($validator->errors());
        }
        $password = bcrypt($request->password);

        $user = new User();
        $user->name = $request->name;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->password = $password;
        if ($request['type_user'] = "Admin Bengkel") {
            $user->assignRole("Admin Bengkel");
            $user->tipe_user = $request->type_user;
        } else {
            $user->asignRole("User");
        }
        $user->save();
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken("MyToken")->plainTextToken;
            $user = $user->with('roles')->first();
            $response = [
                "user" => $user,
                "token" => $token,
                "token_type" => "Bearer"
            ];
            return $this->success($response, "Register Berhasil.");
        } else {
            return $this->error("Register Gagal!");
        }
        // $response = [
        //     "user" => $save_user,
        //     "token" => $token,
        //     "token_type" => "Bearer"
        // ];
        // return $this->success($response, "Register user berhasil.");
    }
    public function login(Request $request)
    {

        // if (empty($request->email) && empty($request->password)) {
        //     return $this->error("Email atau password tidak boleh kosong");
        // }
        $pesan = [
            'required' => 'Email harus di isi!',
            'password.required' => 'Password harus di isi!',
            'email' => 'Email tidak valid!'
        ];
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            $pesan
        );


        if ($validateUser->fails()) {
            return $this->error($validateUser->errors());
        }
        $exist_email = User::where('email', $request->email)->first();
        if (!$exist_email) {
            return $this->error("Email tidak ditemukan!");
        }
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken("MyToken")->plainTextToken;
            $role = $user->roles->pluck('name');
            $response = [
                "user" => $user,
                "token" => $token,
                "role" => $role,
                "token_type" => "Bearer"
            ];
            return $this->success($response, "Login Berhasil.");
        } else {
            return $this->error("Password salah!");
        }
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->logout();
    }
}
