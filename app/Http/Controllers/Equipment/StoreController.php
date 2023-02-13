<?php

namespace App\Http\Controllers\Equipment;

use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(Request $request)
    {
        $result = $this->equipmentService->store($request);
        return response($result, 200);
    }
}
