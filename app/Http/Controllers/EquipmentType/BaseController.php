<?php
namespace App\Http\Controllers\EquipmentType;

use App\Http\Controllers\Controller;
use App\Services\EquipmentType\EquipmentTypeService;

class BaseEquipmentTypeController extends Controller
{
    public $equipmentTypeService;
    public function __construct(EquipmentTypeService $equipmentTypeService)
    {
        $this->equipmentTypeService = $equipmentTypeService;
    }
}
