<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KindResource extends JsonResource
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
            "name" => $this->name,
            "max_size" => $this->max_size,
            "max_age" => $this->max_age,
            "growth_factor" => $this->growth_factor,
        ];
    }
}
