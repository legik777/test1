<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Resources\Equipment\IndexResource;

class ShowController extends BaseController
{
    public function __invoke($id)
    {
        $result = $this->equipmentService->show($id);
        if ($result['status'] == 'complete') {
            return response(new IndexResource($result['message']), 200) ;
        } else {
            return response($result, 200) ;
        }
    }
}
