<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            "id" => $this->id,
            "name" => $this->name,
            "foto" => $this->foto,
            "jenis_kelamin" => $this->jenis_kelamin,
            "no_hp" => $this->no_hp,
            "email" => $this->email,
            "provinsi_id" => $this->provinsi_id,
            "kota_id" => $this->kota_id,
            "kecamatan_id" => $this->kecamatan_id,
            "desa_id" => $this->desa_id,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
