<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceHandler\SiteManager;
use App\Http\Controllers\ResourceHandler\MakerManager;

use App\Http\Controllers\ResourceHandler\ItemsManager;
use App\Http\Controllers\ResourceHandler\CustomerManager;

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
    
    public function DeleteItem(int $itemId)
    {
        $itemsManager = new ItemsManager;
        $status = $itemsManager->DeleteItemById($itemId);

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
        $customerManager = new CustomerManager;
        $url = $customerManager->getCustomerId($itemId);

        if ($url)
        {
            return $url;
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

    public function getItemDetailsForUpdate($id)
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

    public function editItemDetails($request, int $id, int $siteId, int $customerId)
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

        $itemManager = new ItemsManager;
        $items = $itemManager->getItemsByCustomerId($customerId);

        return $items;
    }  

    public function GetSiteIdByItemId(int $itemId)
    {

        $siteManager = new SiteManager;
        $site = $siteManager->GetSiteIdByItemId($itemId);

        return $site;
    }  

}