<?php

namespace App\Http\Resources\Equipment;

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
            'id' => $this->id,
            'equipment_type_id' => $this->equipment_type_id,
            'serial_number' => $this->serial_number,
            'note' => $this->note,
        ];
    }
}
