<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BengkelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //     $foto = asset("/storage/" . $this->foto_bengkel);
        //     $foto = stripslashes($foto);
        return [
            "id" => $this->id,
            "user_id" => $this->id,
            "nama_bengkel" => $this->nama_bengkel,
            "foto_bengkel" => $this->foto_bengkel,
            // "foto_bengkel" => url(stripslashes($this->foto_bengkel)),
            "jam_buka" => $this->jam_buka,
            // "foto" => $foto,
            // "foto" => str_replace('\/', '/', asset("/storage/" . $this->foto_bengkel)),
            "jam_tutup" => $this->jam_tutup,
            "no_hp" => $this->no_hp,
            "email" => $this->email,
            "alamat_lengkap" => $this->alamat_lengkap,
            "longitude" => $this->longitude,
            "latitude" => $this->latitude,
            "provinsi_id" => $this->provinsi_id,
            "kota_id" => $this->kota_id,
            "kecamatan_id" => $this->kecamatan_id,
            "desa_id" => $this->desa_id,
            "created_at" => $this->created_at,
        ];
    }
}
