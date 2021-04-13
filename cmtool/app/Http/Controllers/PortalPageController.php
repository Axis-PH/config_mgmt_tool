<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Equipment;

use App\Http\Controllers\ResourceHandler\DataManager;

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

    public function customerListPage()
    {
        $dataManager = new DataManager;
        $sites = $dataManager->getAllSites();

        return view('pages/portal/customerList')->with('sites', $sites);
    }

    public function deleteSite(int $id)
    {
        $dataManager = new DataManager;
        $status = $dataManager->deleteSite($id);

        if ($status)
            return redirect('/customerList')->with('success', 'Site Deleted' );

        else 
            return redirect('/customerList')->with('error', 'Delete ERROR' );
    }

    public function item(int $itemId)
    {
        $equipment = Equipment::find($itemId);
        return view('pages/portal/item')->with('equipment', $equipment);
    }

    public function itemListByCustomerId(int $customerId)
    {
        $customer = Customer::find($customerId);
        return view('pages/portal/itemList')->with('equipments', $customer->equipments);
    }

    public function itemList()
    {
        return view('pages/portal/itemList');
    }

    public function contactList()
    {
        $customers = Customer::all();
        return view('pages/portal/contactList')->with('customers', $customers);
    }
}
