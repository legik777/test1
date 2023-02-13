<?php

namespace App\Http\Filters;


class EquipmentTypeFilter extends QueryFilter
{
    public function id($value)
    {
        return $this->builder->where('id', 'like', "%{$value}%");
    }

    public function type_name($value)
    {
        return $this->builder->where('type_name', 'like', "%{$value}%");
    }
    public function serial_number_mask($value)
    {
        return $this->builder->where('serial_number_mask', 'like', "%{$value}%");
    }
}
