<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

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

    public function viewMakersPage()
    {
        $dataManager = new DataManager;
        $makers = $dataManager->getAllMakers();

        return view('pages/portal/makers')->with('makers', $makers);
    }

    public function itemListByCustomerId(int $siteId, int $customerId)
    {
        $dataManager = new DataManager;
        $items = $dataManager->getItemsByCustomerId($customerId);
        
        return view('pages/portal/itemList')->with('items', $items->item)->with('siteId', $siteId)->with('customerId', $customerId);
    }

    public function deleteItem(int $itemId)
    {
        $dataManager = new DataManager;
        $site = $dataManager->getSiteIdByItemId($itemId);
        $customer = $dataManager->getCustomerIdByItemId($itemId);
        $status = $dataManager->deleteItem($itemId);


        if ($status)
        {
            return redirect('items/'.$site.'/'.$customer)->with('success');
        }
    }

    public function createItem(int $siteId, int $customerId)
    {
        return view('pages/portal/createItem')->with('siteId', $siteId)->with('customerId', $customerId);
    }

    public function addItem(Request $request, int $siteId, int $customerId)
    {
        $dataManager = new DataManager;
        $status = $dataManager->addItem($request, $siteId, $customerId);

        if ($status)
            return redirect('items/'.$siteId.'/'.$request->customerId)->with('success');
        else
            return redirect('items/'.$siteId.'/'.$request->customerId)->with('error');
    }

    public function editItem(int $siteId, int $customerId, int $id)
    {
        
        $dataManager = new DataManager;
        $item = $dataManager->getItemDetailsForUpdate($id);
        
        return view('pages/portal/itemUpdate')->with('id', $id)->with('item', $item)->with('siteId', $siteId)->with('customerId', $customerId);
    }

    public function updateItem(Request $request, int $id, int $siteId, int $customerId)
    {
        $dataManager = new DataManager;
        $status = $dataManager->editItemDetails($request, $id, $siteId, $customerId);

        if ($status)
            return redirect('items/'.$siteId.'/'.$request->customerId)->with('success');
        else
            return redirect('items/'.$siteId.'/'.$request->customerId)->with('error');        
    }

    public function displayItem(int $id)
    {
        $dataManager = new DataManager;
        $item = $dataManager->getItemDetailsForUpdate($id);

       $equipment = Equipment::find($id);
        return view('pages/portal/displayItem')->with('item', $item);
        // $equipment = Equipment::find($id);
        // return view('pages/portal/displayDevice')->with('equipment', $equipment);
    }

    public function itemList()
    {
        return view('pages/portal/items');
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
    
    public function viewCategory()
    {
        $dataManager = new DataManager;
        $categories = $dataManager->getCategories();
        
        return view('pages/portal/categoryList')->with('categories', $categories);
    }

    public function deleteCategory(int $categoryId)
    {
        $dataManager = new DataManager;
        $status = $dataManager->deleteCategory($categoryId);

        if ($status)
        {
            return redirect('category')->with('success');
        }
    }
}
