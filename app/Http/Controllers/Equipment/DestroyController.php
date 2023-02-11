<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    public function __invoke($id)
    {
        return $this->equipmentService->destroy($id);
    }
}
