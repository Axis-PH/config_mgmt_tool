<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceHandler\SiteManager;
use App\Http\Controllers\ResourceHandler\MakerManager;

use App\Http\Controllers\ResourceHandler\ItemManager;
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
    
    public function DeleteItem($itemId)
    {
        $itemManager = new itemManager;
        $status = $itemManager->DeleteItemById($itemId);

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

    public function addItem($request, int $siteId, int $customerId)
    {
        $itemManager = new itemManager;
        $status = $itemManager->addItem($request, $siteId, $customerId);

        if ($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }

    public function getItemDetailsForUpdate($id)
    {
        $itemManager = new ItemManager;
        $status = $itemManager->getItemDetails($id);

        if ($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }

    public function editItemDetails($request, int $id, int $siteId, int $customerId)
    {
        $itemManager = new ItemManager;
        $status = $itemManager->updateItemDetails($request, $id, $siteId, $customerId);

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