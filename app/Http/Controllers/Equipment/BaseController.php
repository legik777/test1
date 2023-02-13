<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Controllers\Controller;
use App\Services\Equipment\EquipmentService;

/**
 * BaseController
 */
class BaseController extends Controller
{
    public $equipmentService;
    public function __construct(EquipmentService $equipmentService)
    {
        $this->equipmentService = $equipmentService;
    }
}
