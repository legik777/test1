<?php

namespace App\Http\Resources\EquipmentType;

use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
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
            'id'=>$this->id,
            'type_name'=>$this->type_name,
            'serial_number_mask'=>$this->serial_number_mask,
        ];
    }
}
