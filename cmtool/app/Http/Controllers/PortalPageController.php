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

    public function viewMakerUpdatePage(int $makerId)
    {
        $dataManager = new DataManager;
        $maker = $dataManager->getMakerByMakerId($makerId);

        return view('pages/portal/updateMaker')->with('maker', $maker);
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
            return redirect('/site')->with('success', 'Site Added' );

        else 
            return redirect('/site')->with('error', 'Site Add ERROR' );
    }

    public function updateSite(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->updateSite($request);

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

    public function deleteMaker(int $id)
    {
        $dataManager = new DataManager;
        $status = $dataManager->deleteMaker($id);

        if ($status)
            return redirect('/maker')->with('success', 'Maker Deleted' );

        else 
            return redirect('/maker')->with('error', 'Delete ERROR' );
    }

    public function viewMakerListPage()
    {
        $dataManager = new DataManager;
        $makers = $dataManager->getAllMakers();

        return view('pages/portal/makerList')->with('makers', $makers);
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

    public function deleteDevice(int $itemId)
    {
        $dataManager = new DataManager;
        $url = $dataManager->getCustomerIdByItemId($itemId);
        $status = $dataManager->DeleteDevice($itemId);
        
        if ($status)
        {
            return redirect('itemList/'.$url)->with('success');
        }
    }

    public function createDevice()
    {
        return view('pages/portal/deviceCreation');
    }

    public function addDevice(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->addDevice($request);

        if ($status)
            return redirect('itemList/'.$request->customerId)->with('success');
        else
            return redirect('itemList/'.$request->customerId)->with('error');
    }

    public function editDevice(int $id)
    {
        $dataManager = new DataManager;
        $equipment = $dataManager->getDeviceDetailsForUpdate($id);

        return view('pages/portal/deviceUpdate')->with('id', $id)->with('equipment', $equipment);
    }

    public function updateDevice(Request $request, int $id)
    {
        $dataManager = new DataManager;
        $status = $dataManager->editDeviceDetails($request, $id);

        if ($status)
            return redirect('itemList/'.$request->customerId)->with('success');
        else
            return redirect('itemList/'.$request->customerId)->with('error');        
    }

    public function displayDevice(int $id)
    {
        $dataManager = new DataManager;
        $equipment = $dataManager->getDeviceDetailsForUpdate($id);

        $equipment = Equipment::find($id);
        return view('pages/portal/displayDevice')->with('equipment', $equipment);
    }

    public function itemList()
    {
        return view('pages/portal/itemList');
    }

    public function viewCustomerListPage() {

        $dataManager = new DataManager;
        $customers = $dataManager->getAllCustomers();

        return view('pages/portal/customerList')->with('customers', $customers);
    }

    public function viewUpdateCustomerListPage(int $customerId) {

        $dataManager = new DataManager;
        $customers = $dataManager->getCustomerByCustomerId($customerId);

        return view('pages/portal/updateCustomerList')->with('customers', $customers);
    }

    public function updateCustomer(Request $request) {

        $dataManager = new DataManager;
        $status = $dataManager->updateCustomer($request);

        if ($status)
        {
            return redirect('/customers')->with('success');
        }
    }

    public function deleteCustomer(int $customerId) {

        $dataManager = new DataManager;
        $status = $dataManager->deleteCustomer($customerId);
        
        if ($status)
        {
            return redirect('/customers')->with('success');
        }

    }

    public function viewAddCustomerListPage() {

        $dataManager = new DataManager;
        $customerId = $dataManager->getLastCustomerId() + 1;

        return view('pages/portal/addCustomerList')->with('customerId', $customerId);
    }

    public function addCustomer(Request $request) {

        $dataManager = new DataManager;
        $status = $dataManager->addCustomer($request);

        if ($status)
        {
            return redirect('/customers')->with('success');
        }
    }
}
