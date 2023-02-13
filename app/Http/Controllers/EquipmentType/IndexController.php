<?php

namespace App\Http\Controllers\EquipmentType;

use App\Http\Controllers\Controller;
use App\Http\Filters\EquipmentTypeFilter;
use App\Http\Resources\EquipmentType\IndexResource;
use App\Models\EquipmentType;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(EquipmentTypeFilter $filters, Request $request)
    {
        $result = EquipmentType::filter($filters)->
        paginate($request->query('per_page'), ['*'], 'page', $request->query('page'));
        return IndexResource::collection($result);
    }
}
