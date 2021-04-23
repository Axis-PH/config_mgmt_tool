<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceHandler\ItemsManager;
use App\Http\Controllers\ResourceHandler\CategoriesManager;
use App\Http\Controllers\ResourceHandler\CustomersManager;

use App\Models\Site;


class DataManager extends Controller
{
    public function getAllSites()
    {
        $siteManager = new SitesManager;
        $sites = $siteManager->getAllSites();

        return $sites;
    }

    public function getAllMakers()
    {
        $makerManager = new MakersManager;
        $makers = $makerManager->getAllMakers();

        return $makers;
    }

    public function addSite(Request $request)
    {
        $siteManager = new SitesManager;
        $status = $siteManager->addSite($request);

        return $status;
    }

    public function addMaker(Request $request)
    {
        $makerManager = new MakersManager;
        $status = $makerManager->addMaker($request);

        return $status;
    }

    public function updateSite(Request $request)
    {
        $siteManager = new SitesManager;
        $status = $siteManager->updateSite($request);

        return $status;
    }

    public function updateMaker(Request $request)
    {
        $makerManager = new MakersManager;
        $status = $makerManager->updateMaker($request);

        return $status;
    }

    public function getCustomerDropdownList()
    {
        $customersManager = new CustomersManager;
        $customerDropdownList = $customersManager->getCustomerDropdownList();

        return $customerDropdownList;
    }

    public function getCategoriesDropdownList()
    {
        $categoriesManager = new CategoriesManager;
        $categoriesDropdownList = $categoriesManager->getCategoriesDropdownList();

        return $categoriesDropdownList;
    }

    public function getMakersDropdownList()
    {
        $makersManager = new makersManager;
        $makersDropdownList = $makersManager->getMakersDropdownList();

        return $makersDropdownList;
    }

    public function getSiteById($id)
    {
        $siteManager = new SitesManager;
        $site = $siteManager->getSiteById($id);
        
        return $site;
    }

    public function getMakerByMakerId($id)
    {
        $makerManager = new MakersManager;
        $maker = $makerManager->getMakerById($id);

        return $maker;
    }

    public function deleteSite(int $id)
    {
        $siteManager = new SitesManager;
        $status = $siteManager->deleteSite($id);
        
        return $status;
    }

    public function deleteMaker(int $id)
    {
        $makerManager = new MakersManager;
        $status = $makerManager->deleteMaker($id);
        
        return $status;
    }
    
    public function deleteItem(int $itemId)
    {
        $itemsManager = new ItemsManager;
        $status = $itemsManager->deleteItemById($itemId);

        return $status;
    }

    public function getCustomerIdByItemId($itemId)
    {
        $customersManager = new CustomersManager;
        $customerId = $customersManager->getCustomerId($itemId);

        return $customerId;
    }

    public function addItem($request, int $siteId, int $customerId)
    {
        $itemsManager = new ItemsManager;
        $status = $itemsManager->addItem($request, $siteId, $customerId);

        return $status;
    }

    public function getItemDetails($id)
    {
        $itemsManager = new ItemsManager;
        $status = $itemsManager->getItemDetails($id);

        return $status;
    }

    public function getCategoryName($categoryId)
    {
        $categoriesManager = new CategoriesManager;
        $status = $categoriesManager->getCategoryName($categoryId);

        return $status;
    }

    public function getCustomerName($customerId)
    {
        $customersManager = new CustomersManager;
        $status = $customersManager->getCustomerName($customerId);

        return $status;
    }

    public function getSiteName($siteId)
    {
        $sitesManager = new SitesManager;
        $status = $sitesManager->getSiteName($siteId);

        return $status;
    }

    public function getMakerName($makerId)
    {
        $makersManager = new MakersManager;
        $status = $makersManager->getMakerName($makerId);

        return $status;
    }

    public function updateItemDetails($request, int $id, int $siteId, int $customerId)
    {
        $itemsManager = new ItemsManager;
        $status = $itemsManager->updateItemDetails($request, $id, $siteId, $customerId);

        return $status;
    }

    public function getAllItems(int $siteId, int $customerId)
    {

        $itemsManager = new ItemsManager;
        $items = $itemsManager->getAllItems($siteId, $customerId);

        return $items;
    }  

    public function getSiteIdByItemId(int $itemId)
    {

        $sitesManager = new SitesManager;
        $site = $sitesManager->getSiteIdByItemId($itemId);

        return $site;
    }  

    public function getCategories()
    {

        $categoriesManager = new CategoriesManager;
        $categories = $categoriesManager->getCategories();

        return $categories;
    }

    public function deleteCategory(int $categoryId)
    {
        $categoriesManager = new CategoriesManager;
        $status = $categoriesManager->deleteCategory($categoryId);

        return $status;
    }

    public function getCategoryForUpdate($id)
    {
        $categoriesManager = new CategoriesManager;
        $status = $categoriesManager->getCategoryForUpdate($id);

        return $status;
    }

    public function addCategory(request $request)
    {
        $categoriesManager = new CategoriesManager;
        $status = $categoriesManager->addCategory($request);

        return $status;
    }

    public function updateCategory(int $categoryId, Request $request)
    {
        $categoriesManager = new CategoriesManager;
        $status = $categoriesManager->updateCategory($categoryId, $request);

        return $status;
    }

    public function getAllCustomers() {

        $customersManager = new CustomersManager;
        $customers = $customersManager->getAllCustomer();

        return $customers;
    }

    public function getCustomerByCustomerId($customer_id) {

        $customersManager = new CustomersManager;
        //$customers = $customersManager->getCustomerById($customer_id); //naming convention singular
        $customer = $customersManager->getCustomerById($customer_id);

        return $customer;
    }

    public function updateCustomer($request) {

        $customersManager = new CustomersManager;
        // $updateStatus = true; 
        // $addStatus = false;
        // $status = $customersManager->updateCustomer($request, $updateStatus, $addStatus);
        $status = $customersManager->updateCustomer($request);
        if ($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }

    public function deleteCustomer($customerId) {

        $customersManager = new CustomersManager;
        $status = $customersManager->deleteCustomer($customerId);

        if ($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
       
    }

    public function getLastCustomerId() {

        $customersManager = new CustomersManager;
        //$getLastCustomerId = $customersManager->getLastCustomerId(); //naming convention
        $lastCustomerId = $customersManager->getLastCustomerId();
        
        return $lastCustomerId;
    }

    public function addCustomer($request) {

        $customersManager = new CustomersManager;
        // $addStatus = true;
        // $updateStatus = false;
        // $status = $customersManager->addCustomer($request, $addStatus, $updateStatus);
        $status = $customersManager->addCustomer($request);
        if ($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
       
    }

}