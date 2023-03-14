<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index()
    {
        $user = User::all();
        if ($user) {
            return $this->success(UserResource::collection($user), "Data Berhasil dikirim");
        } else {
            return $this->error("Data tidak ditemukan!");
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            return $this->success($user, "Data Berhasil dikirim");
        } else {
            return $this->error("Data tidak ditemukan");
        }
    }
}
