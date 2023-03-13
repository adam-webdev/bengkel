<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function success($result, $message)
    {
        $response = [
            "success" => true,
            "data" => $result,
            "message" => $message
        ];
        return response()->json($response, 200);
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
