<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckController extends Controller
{
    public function __invoke()
    {
        $test = Auth::check();
        return response(['data'=>$test,'user'=>Auth::user()],200);
    }
}
