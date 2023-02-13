<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Controllers\Controller;
use App\Models\Equipment;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    public function __invoke($id)
    {
        $result = $this->equipmentService->destroy($id);
        return response($result, 200) ;
    }
}
