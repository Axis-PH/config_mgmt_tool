<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Site;


class DataManager extends Controller
{
    public function getAllSites()
    {
        $siteManager = new SiteManager;
        $sites = $siteManager->getAllSites();

        return $sites;
    }

    public function deleteSite(int $id)
    {
        $siteManager = new SiteManager;
        $status = $siteManager->deleteSite($id);
        
        return $status;
    }
}

