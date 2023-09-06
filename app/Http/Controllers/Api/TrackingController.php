<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends BaseController
{
    public function store(Request $request)
    {
        $new_track = new Tracking();
        $new_track->bengkel_id = $request->bengkel_id;
        $new_track->lng = $request->lng;
        $new_track->lat = $request->lat;
        if ($new_track->save()) {
            return $this->success('Data berhasil disimpan', 201);
        }
    }
}
