<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\PageHandler\UserPageController;

use App\User;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userPageController = new UserPageController;
        return $userPageController->index();
    }
}
