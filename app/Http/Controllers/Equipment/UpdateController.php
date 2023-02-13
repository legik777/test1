<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke($id, Request $request)
    {
        $result = $this->equipmentService->update($id, $request);
        return response($result, 200);
    }
}
