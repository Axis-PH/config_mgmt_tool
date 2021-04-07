<?php

namespace App\Http\Controllers\PageHandler;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceHandler\RecordsManager;
use App\Http\Controllers\ResourceHandler\RecordsViewer;
use Illuminate\Http\Request;

use App\User;

class UserPageController extends Controller
{
    public function index()
    {
        return view('user_view/menu')->with('user', auth()->user());
    }
}
