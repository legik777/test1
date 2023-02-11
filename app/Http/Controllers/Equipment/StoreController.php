<?php

namespace App\Http\Controllers\Equipment;

use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(Request $request)
    {
        return  $this->equipmentService->store($request);
    }
}
