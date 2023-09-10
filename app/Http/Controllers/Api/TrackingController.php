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
        $new_track->heading = $request->heading;
        if ($new_track->save()) {
            return $this->success('Data berhasil disimpan', 201);
        }
    }
    public function getDataTrack($bengkel_id)
    {
        $track = Tracking::where('bengkel_id', $bengkel_id)->latest()->first();
        if ($track) {
            return $this->success($track, 200);
        }
        return $this->error("Data tidak ditemukan", 401);
    }
}