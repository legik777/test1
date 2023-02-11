<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NameController extends Controller
{
    public function __invoke()
    {
        return Auth::user();
    }
}
