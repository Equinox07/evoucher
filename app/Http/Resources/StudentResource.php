<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            "id"=> $this->id,
            "firstname"=> $this->firstname,
            "middle_name"=> $this->middle_name,
            "lastname"=> $this->lastname,
            "type"=> $this->type,
            "mobile"=> $this->mobile,
            "slug"=> $this->slug,
            "email"=> $this->email,
        ];
    }
}
