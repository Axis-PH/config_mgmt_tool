<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceHandler\SiteManager;

use App\Models\Site;


class DataManager extends Controller
{
    public function getAllSites()
    {
        $siteManager = new SiteManager;
        $sites = $siteManager->getAllSites();

        return $sites;
    }

    public function addSite(Request $request)
    {
        $siteManager = new SiteManager;
        $status = $siteManager->addSite($request);

        return $status;
    }

    public function editSite(Request $request)
    {
        $siteManager = new SiteManager;
        $status = $siteManager->editSite($request);

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

    public function deleteSite(int $id)
    {
        $siteManager = new SiteManager;
        $status = $siteManager->deleteSite($id);
        
        return $status;
    }

}

