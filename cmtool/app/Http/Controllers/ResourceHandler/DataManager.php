<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceHandler\SiteManager;
use App\Http\Controllers\ResourceHandler\MakerManager;

use App\Http\Controllers\ResourceHandler\DeviceManager;
use App\Http\Controllers\ResourceHandler\CustomerManager;

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
        $customerManager = new CustomersManager;
        $customerDropdownList = $customerManager->getCustomerDropdownList();

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

}