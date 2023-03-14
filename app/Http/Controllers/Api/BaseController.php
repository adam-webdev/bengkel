<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function success($result, $message, $code = 200)
    {
        $response = [
            "success" => true,
            "data" => $result,
            "message" => $message
        ];
        return response()->json($response, $code, [], JSON_UNESCAPED_SLASHES);
    }

    public function error($error, $messageError = [], $code = 404)
    {
        $response = [
            "success" => false,
            "message" => $error,
        ];
        if (!empty($messageError)) {
            $response['data'] = $messageError;
        }
        return response()->json($response, $code);
    }
}
