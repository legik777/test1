<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

/**
 * EquipmentFilters
 */
class EquipmentFilters extends QueryFilter
{
    /**
     * id
     *
     * @param  mixed $value
     * @return Builder
     */
    public function id($value): Builder
    {
        return $this->builder->where('id', 'like', "%{$value}%");
    }

    /**
     * Equipment_type_id
     *
     * @param  mixed $value
     * @return Builder
     */
    public function equipment_type_id($value): Builder
    {
        return $this->builder->where('equipment_type_id', 'like', "%{$value}%");
    }
    /**
     * serial_number
     *
     * @param  mixed $value
     * @return Builder
     */
    public function serial_number($value): Builder
    {
        return $this->builder->where('serial_number', 'like', "%{$value}%");
    }
    /**
     * note
     *
     * @param  mixed $value
     * @return Builder
     */
    public function note($value): Builder
    {
        return $this->builder->where('note', 'like', "%{$value}%");
    }
}
