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

    public function viewSiteListPage()
    {
        $dataManager = new DataManager;
        $sites = $dataManager->getAllSites();

        return view('pages/portal/siteList')->with('sites', $sites);
    }

    public function viewSiteCreatePage()
    {
        $dataManager = new DataManager;
        $customers = $dataManager->getCustomerDropdownList();

        return view('pages/portal/createSite')->with('customers', $customers);
    }

    public function viewSiteUpdatePage(int $siteId)
    {
        $dataManager = new DataManager;
        $site = $dataManager->getSiteById($siteId);
        $customers = $dataManager->getCustomerDropdownList();
        $selectedCustomerId = $site->customer->id;

        return view('pages/portal/updateSite')->with('site', $site)->with('customers', $customers)
            ->with('selectedCustomerId', $selectedCustomerId);
    }

    public function addSite(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->addSite($request);

        if ($status)
            return redirect('/site')->with('success', 'Site Added' );

        else 
            return redirect('/site')->with('error', 'Site Add ERROR' );
    }

    public function editSite(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->editSite($request);

        if ($status)
            return redirect('/site')->with('success', 'Site Updated' );

        else 
            return redirect('/site')->with('error', 'Site Update ERROR' );
    }

    public function deleteSite(int $id)
    {
        $dataManager = new DataManager;
        $status = $dataManager->deleteSite($id);

        if ($status)
            return redirect('/site')->with('success', 'Site Deleted' );

        else 
            return redirect('/site')->with('error', 'Delete ERROR' );
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
