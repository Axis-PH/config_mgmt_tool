<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceHandler\SiteManager;
use App\Http\Controllers\ResourceHandler\MakerManager;

use App\Http\Controllers\ResourceHandler\DeviceManager;
use App\Http\Controllers\ResourceHandler\CustomersManager;

use App\Models\Site;


class DataManager extends Controller
{
    public function getAllSites()
    {
        $siteManager = new SiteManager;
        $sites = $siteManager->getAllSites();

        return $sites;
    }

    public function getAllMakers()
    {
        $makerManager = new MakerManager;
        $makers = $makerManager->getAllMakers();

        return $makers;
    }

    public function addSite(Request $request)
    {
        $siteManager = new SiteManager;
        $status = $siteManager->addSite($request);

        return $status;
    }

    public function updateSite(Request $request)
    {
        $siteManager = new SiteManager;
        $status = $siteManager->updateSite($request);

        return $status;
    }

    public function getCustomerDropdownList()
    {
        $customerManager = new CustomerManager;
        $customerDropdownList = $customerManager->getCustomerDropdownList();

        return $customerDropdownList;
    }

    public function getSiteById($id)
    {
        $siteManager = new SiteManager;
        $site = $siteManager->getSiteById($id);
        
        return $site;
    }

    public function getMakerByMakerId($id)
    {
        $makerManager = new MakerManager;
        $maker = $makerManager->getMakerById($id);

        return $maker;
    }

    public function deleteSite(int $id)
    {
        $siteManager = new SiteManager;
        $status = $siteManager->deleteSite($id);
        
        return $status;
    }

    public function deleteMaker(int $id)
    {
        $makerManager = new MakerManager;
        $status = $makerManager->deleteMaker($id);
        
        return $status;
    }
    
    public function DeleteDevice($itemId)
    {
        $deviceManager = new DeviceManager;
        $status = $deviceManager->DeleteItemById($itemId);

        if ($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }

    public function getCustomerIdByItemId($itemId)
    {
        $customerManager = new CustomerManager;
        $url = $customerManager->getCustomerId($itemId);

        if ($url)
        {
            return $url;
        }
        else
        {
            return null;
        }
    }

    public function addDevice($request)
    {
        $deviceManager = new DeviceManager;
        $status = $deviceManager->addDevice($request);

        if ($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }

    public function getDeviceDetailsForUpdate($id)
    {
        $deviceManager = new DeviceManager;
        $status = $deviceManager->getDeviceDetails($id);

        if ($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }

    public function editDeviceDetails($request, int $id)
    {
        $deviceManager = new DeviceManager;
        $status = $deviceManager->updateDeviceDetails($request, $id);

        if ($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }

    public function getAllCustomers() {

        $customersManager = new CustomersManager;
        $customers = $customersManager->getCustomerList();

        return $customers;
    }

    public function getCustomerByCustomerId($customer_id) {

        $customersManager = new CustomersManager;
        $customers = $customersManager->getCustomerById($customer_id);

        return $customers;
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

        return $status;
       
    }

}