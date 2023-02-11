<?php

namespace App\Http\Controllers\Equipment;

class ShowController extends BaseController
{
    public function __invoke($id)
    {
        return $this->equipmentService->show($id);
    }
}
