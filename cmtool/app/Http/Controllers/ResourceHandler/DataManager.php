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

        if ($status)
        {
            return $status;
        }
        else
        {
            return false;
        }
    }

    public function getCustomerIdByItemId($itemId)
    {
        $customersManager = new CustomersManager;
        $customerId = $customersManager->getCustomerId($itemId);

        if ($customerId)
        {
            return $customerId;
        }
        else
        {
            return false;
        }
    }

    public function addItem($request, int $siteId, int $customerId)
    {
        $itemsManager = new ItemsManager;
        $status = $itemsManager->addItem($request, $siteId, $customerId);

        if ($status)
        {
            return $status;
        }
        else
        {
            return false;
        }
    }

    public function getItemDetails($id)
    {
        $itemsManager = new ItemsManager;
        $status = $itemsManager->getItemDetails($id);

        if ($status)
        {
            return $status;
        }
        else
        {
            return false;
        }
    }

    public function updateItemDetails($request, int $id, int $siteId, int $customerId)
    {
        $itemsManager = new ItemsManager;
        $status = $itemsManager->updateItemDetails($request, $id, $siteId, $customerId);

        if ($status)
        {
            return $status;
        }
        else
        {
            return false;
        }
    }

    public function getItemsByCustomerId(int $customerId)
    {

        $itemsManager = new ItemsManager;
        $items = $itemsManager->getItemsByCustomerId($customerId);

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

        if ($status)
        {
            return $status;
        }
        else
        {
            return false;
        }
    }

    public function getCategoryForUpdate($id)
    {
        $categoriesManager = new CategoriesManager;
        $status = $categoriesManager->getCategoryForUpdate($id);

        if ($status)
        {
            return $status;
        }
        else
        {
            return false;
        }
    }

    public function addCategory(request $request)
    {
        $categoriesManager = new CategoriesManager;
        $status = $categoriesManager->addCategory($request);

        if ($status)
        {
            return $status;
        }
        else
        {
            return false;
        }
    }

    public function updateCategory(int $categoryId, Request $request)
    {
        $categoriesManager = new CategoriesManager;
        $status = $categoriesManager->updateCategory($categoryId, $request);

        if ($status)
        {
            return $status;
        }
        else
        {
            return false;
        }
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