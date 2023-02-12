<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Controllers\Controller;
use App\Http\Filters\EquipmentFilters;
use App\Http\Requests\Equipment\IndexRequest;
use App\Http\Resources\Equipment\IndexResource;
use App\Models\Equipment;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(Request $request)
    {
        $filters = new EquipmentFilters($request);
        $result = Equipment::filter($filters)->paginate($request->query('per_page'),['*'],'page',$request->query('page'));
        return IndexResource::collection($result);
    }
}
