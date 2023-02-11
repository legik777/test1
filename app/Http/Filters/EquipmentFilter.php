<?php

namespace App\Http\Filters;

class EquipmentFilter extends QueryFilter
{
    public function id($value)
    {
      return $this->builder->where('id', 'like', "%{$value}%");
    }

    public function equipment_type_id($value)
    {
        return $this->builder->where('equipment_type_id', 'like', "%{$value}%");
    }
    public function serial_number($value)
    {
        return $this->builder->where('serial_number', 'like', "%{$value}%");
    }
    public function note($value)
    {
        return $this->builder->where('note', 'like', "%{$value}%");
    }
}
