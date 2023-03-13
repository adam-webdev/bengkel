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
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "no_hp" => "required",
            "email" => "required|email",
            "password" => "required|min:6|max:20",
            "confirm_password" => "required|same:password"
        ]);
        if ($validator->fails()) {
            return $this->error("Register Gagal", $validator->errors());
        }
        $password = bcrypt($request->password);

        $user = new User();
        $user->name = $request->name;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->password = $password;
        if ($input['type_user'] = "Admin Bengkel") {
            $user->assignRole("Admin Bengkel");
        } else {
            $user->asignRole("User");
        }
        $save_user  = $user->save();

        $token = $user->createToken("MyToken")->plainTextToken;
        $response = [
            "user" => $save_user,
            "token" => $token,
            "token_type" => "Bearer"
        ];
        return $this->success($response, "Register user berhasil.");
    }
    public function login(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );
        if ($validateUser->fails()) {
            return $this->error("Login Gagal", $validateUser->errors());
        }

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken("MyToken")->plainTextToken;
            $response = [
                "user" => $user,
                "token" => $token,
                "token_type" => "Bearer"
            ];
            return $this->success($response, "Login Berhasil.");
        } else {
            return $this->error("Unauthorised", "Login Gagal");
        }
    }
    public function logout(Request $request)
    {
        auth()->user()->tokens()->logout();
    }
}
