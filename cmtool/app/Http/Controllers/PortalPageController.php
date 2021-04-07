<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Base;

class PortalPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages/portal/landing');
    }

    public function customerList()
    {
        $bases = Base::all();
        return view('pages/portal/customerList')->with('bases', $bases);
    }

    public function itemList()
    {
        // $bases = Base::all();
        return view('pages/portal/itemList');
    }
}
