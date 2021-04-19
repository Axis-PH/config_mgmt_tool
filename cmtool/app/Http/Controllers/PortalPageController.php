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

    public function viewSitesPage()
    {
        $dataManager = new DataManager;
        $sites = $dataManager->getAllSites();
        // dd($sites[0]->customer->customer_name);

        return view('pages/portal/sites')->with('sites', $sites);
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
        $selectedCustomerId = $site->customer->customer_id;

        return view('pages/portal/updateSite')->with('site', $site)->with('customers', $customers)
            ->with('selectedCustomerId', $selectedCustomerId);
    }

    public function viewMakerUpdatePage(int $makerId)
    {
        $dataManager = new DataManager;
        $maker = $dataManager->getMakerByMakerId($makerId);

        return view('pages/portal/updateMaker')->with('maker', $maker);
    }

    public function viewMakerCreatePage()
    {
        return view('pages/portal/createMaker');
    }

    public function viewContactLandingPage()
    {
        return view('pages/portal/contactLanding');
    }

    public function addSite(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->addSite($request);

        if ($status)
            return redirect('/sites')->with('success', 'Site Added');

        else 
            return redirect('/sites')->with('error', 'Site Add ERROR');
    }

    public function addMaker(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->addMaker($request);

        if ($status)
            return redirect('/makers')->with('success', 'Maker Added');

        else 
            return redirect('/makers')->with('error', 'Maker Add ERROR');
    }

    public function updateSite(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->updateSite($request);

        if ($status)
            return redirect('/sites')->with('success', 'Site Updated');

        else 
            return redirect('/sites')->with('error', 'Site Update ERROR');
    }

    public function updateMaker(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->updateMaker($request);

        if ($status)
            return redirect('/makers')->with('success', 'Maker Updated');

        else 
            return redirect('/makers')->with('error', 'Maker Update ERROR');
    }

    public function deleteSite(int $id)
    {
        $dataManager = new DataManager;
        $status = $dataManager->deleteSite($id);

        if ($status)
            return redirect('/sites')->with('success', 'Site Deleted');

        else 
            return redirect('/sites')->with('error', 'Delete ERROR');
    }

    public function deleteMaker(int $id)
    {
        $dataManager = new DataManager;
        $status = $dataManager->deleteMaker($id);

        if ($status)
            return redirect('/makers')->with('success', 'Maker Deleted');

        else 
            return redirect('/makers')->with('error', 'Delete ERROR');
    }

    public function viewMakerListPage()
    {
        $dataManager = new DataManager;
        $makers = $dataManager->getAllMakers();

        return view('pages/portal/makers')->with('makers', $makers);
    }

    // public function item(int $itemId)
    // {
    //     $equipment = Equipment::find($itemId);
    //     return view('pages/portal/item')->with('equipment', $equipment);
    // }

    // public function itemListByCustomerId(int $customerId)
    // {
    //     $customer = Customer::find($customerId);
    //     return view('pages/portal/itemList')->with('equipments', $customer->equipments);
    // }

    public function itemList()
    {
        return view('pages/portal/itemList');
    }

    // public function contactList()
    // {
    //     $customers = Customer::all();
    //     return view('pages/portal/contactList')->with('customers', $customers);
    // }
}
