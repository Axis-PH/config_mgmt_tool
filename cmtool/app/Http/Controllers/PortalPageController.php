<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

use App\Http\Controllers\ResourceHandler\DataManager;
use Redirect;

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

        if (empty($site->customer))
            return redirect('/sites')->with('error', __('site.siteUpdateFailed'));

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

        if ($status == 'true')
            return redirect('/sites')->with('success', __('site.siteAdded'));

        else 
            return redirect('/sites')->with('error', $status);
    }

    public function addMaker(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->addMaker($request);

        if ($status == 'true')
            return redirect('/makers')->with('success', __('maker.makerAdded'));

        else 
            return redirect('/makers')->with('error', $status);
    }

    public function updateSite(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->updateSite($request);

        if ($status == 'true')
            return redirect('/sites')->with('success', __('site.siteUpdated'));

        else 
            return redirect('/sites')->with('error', $status);
    }

    public function updateMaker(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->updateMaker($request);

        if ($status == 'true')
            return redirect('/makers')->with('success', __('maker.makerUpdated'));

        else 
            return redirect('/makers')->with('error', $status);
    }

    public function deleteSite(int $id)
    {
        $dataManager = new DataManager;
        $status = $dataManager->deleteSite($id);

        if ($status)
            return redirect('/sites')->with('success', __('site.siteDeleted'));

        else 
            return redirect('/sites')->with('error', __('site.siteDeleteFailed'));
    }

    public function deleteMaker(int $id)
    {
        $dataManager = new DataManager;
        $status = $dataManager->deleteMaker($id);

        if ($status)
            return redirect('/makers')->with('success', __('maker.makerDeleted'));

        else 
            return redirect('/makers')->with('error', __('maker.makerDeleteFailed'));
    }

    public function viewMakersPage()
    {
        $dataManager = new DataManager;
        $makers = $dataManager->getAllMakers();

        return view('pages/portal/makers')->with('makers', $makers);
    }

    public function viewItemsPage(int $siteId, int $customerId)
    {
        $dataManager = new DataManager;
        $items = $dataManager->getAllItems($siteId, $customerId);
        
        return view('pages/portal/items')->with('items', $items)->with('siteId', $siteId)->with('customerId', $customerId);
    }

    public function deleteItem(int $itemId)
    {
        $dataManager = new DataManager;
        $site = $dataManager->getSiteIdByItemId($itemId);
        $customer = $dataManager->getCustomerIdByItemId($itemId);
        $status = $dataManager->deleteItem($itemId);
        
        if ($status)
            return redirect('items/list/'.$site.'/'.$customer)->with('success', __('item.itemDeleted'));
        else
            return redirect('items/list/'.$site.'/'.$customer)->with('error', __('item.deleteItemFailed'));
    }

    public function viewCreateItemPage(int $siteId, int $customerId)
    {
        $dataManager = new DataManager;
        $categories = $dataManager->getCategoriesDropdownList();
        $makers = $dataManager->getMakersDropdownList();

        return view('pages/portal/createItem')->with('siteId', $siteId)->with('customerId', $customerId)
            ->with('categories', $categories)->with('makers', $makers);
    }

    public function addItem(Request $request, int $siteId, int $customerId)
    {
        $dataManager = new DataManager;
        $status = $dataManager->addItem($request, $siteId, $customerId);

        // if ($status)
        //     return redirect('items/list/'.$siteId.'/'.$request->customerId)->with('success', __('item.itemAdded'));
        // else
        //     return redirect('items/list/'.$siteId.'/'.$request->customerId)->with('error', __('item.addItemFailed'));
        if ($status == 'true') {
            return redirect('items/list/'.$siteId.'/'.$request->customerId)->with('success', __('item.itemAdded'));
        }
        else {
            return redirect('items/list/'.$siteId.'/'.$request->customerId)->with('error', $status);
        }
    }

    public function viewUpdateItemPage(int $siteId, int $customerId, int $id)
    {
        
        $dataManager = new DataManager;
        $item = $dataManager->getItemDetails($id);
        $categories = $dataManager->getCategoriesDropdownList();
        $makers = $dataManager->getMakersDropdownList();
        
        return view('pages/portal/updateItem')->with('id', $id)->with('item', $item)->with('siteId', $siteId)
            ->with('customerId', $customerId)->with('categories', $categories)->with('makers', $makers);
    }

    public function updateItem(Request $request, int $id, int $siteId, int $customerId)
    {
        $dataManager = new DataManager;
        $status = $dataManager->updateItemDetails($request, $id, $siteId, $customerId);

        // if ($status)
        //     return redirect('items/list/'.$siteId.'/'.$request->customerId)->with('success', __('item.itemUpdated'));
        // else
        //     return redirect('items/list/'.$siteId.'/'.$request->customerId)->with('error', __('item.updateItemFailed'));        
        if ($status == 'true') {
            return redirect('items/list/'.$siteId.'/'.$request->customerId)->with('success', __('item.itemUpdated'));
        }
        else {
            return redirect('items/list/'.$siteId.'/'.$request->customerId)->with('error', $status);
        }
    }

    public function viewItemInfoPage(int $id)
    {
        $dataManager = new DataManager;
        $item = $dataManager->getItemDetails($id);
        $categoryName = $dataManager->getCategoryName($item->category);
        $customerName = $dataManager->getCustomerName($item->customer_id);
        $siteName = $dataManager->getSiteName($item->site_id);
        $makerName = $dataManager->getMakerName($item->maker_id);

        return view('pages/portal/displayItem')->with('item', $item)->with('categoryName', $categoryName)
                ->with('customerName', $customerName)->with('siteName', $siteName)->with('makerName', $makerName);
    }

    public function viewCustomerPage() {

        $dataManager = new DataManager;
        $customers = $dataManager->getAllCustomers();

        return view('pages/portal/customer')->with('customers', $customers);
    }

    public function viewUpdateCustomerPage(int $customerId) {

        $dataManager = new DataManager;
        $customer = $dataManager->getCustomerByCustomerId($customerId);

        return view('pages/portal/updateCustomer')->with('customer', $customer);
    }

    public function updateCustomer(Request $request) {

        $dataManager = new DataManager;
        $status = $dataManager->updateCustomer($request);

        if ($status == 'true') {
            return redirect('/customers')->with('success', __('customer.updatedCustomer'));
        }
        else {
            return redirect('/customers')->with('error', $status);
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

    public function viewAddCustomerPage() {

        $dataManager = new DataManager;
        $customerId = $dataManager->getLastCustomerId();

        return view('pages/portal/createCustomer')->with('customerId', $customerId);
    }

    public function addCustomer(Request $request) {

        $dataManager = new DataManager;
        $status = $dataManager->addCustomer($request);

        if ($status == 'true') {
            return redirect('/customers')->with('success',  __('customer.addedCustomer'));
        }
        else {
            return redirect('/customers')->with('error', $status);
        }
    }
    
    public function viewCategoriesPage()
    {
        $dataManager = new DataManager;
        $categories = $dataManager->getCategories();
        
        return view('pages/portal/categories')->with('categories', $categories);
    }

    public function deleteCategory(int $categoryId)
    {
        $dataManager = new DataManager;
        $status = $dataManager->deleteCategory($categoryId);

        if ($status)
            return redirect('categories')->with('success')->with('success', __('category.categoryDeleted'));
        else
            return redirect('categories')->with('error')->with('error', __('category.deleteCategoryFailed'));     
    }

    public function viewCreateCategoryPage()
    {
        return view('pages/portal/createCategory');
    }

    public function addCategory(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->addCategory($request);

        if ($status)
            return redirect('categories')->with('success')->with('success', __('category.categoryAdded'));
        else
            return redirect('categories')->with('error')->with('error', __('category.addCategoryFailed'));
    }

    public function viewUpdateCategoryPage(int $categoryId)
    {
        $dataManager = new DataManager;
        $category = $dataManager->getCategoryForUpdate($categoryId);
        
        return view('pages/portal/updateCategory')->with('category', $category)->with('categoryId', $categoryId);
    }

    public function updateCategory(int $categoryId, Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->updateCategory($categoryId, $request);
        
        if ($status)
            return redirect('categories')->with('success')->with('success', __('category.categoryUpdated'));
        else
            return redirect('categories')->with('error')->with('error', __('category.updateCategoryFailed'));  
    }
}
