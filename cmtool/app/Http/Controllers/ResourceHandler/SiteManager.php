<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Facades\App\Helper\FieldChecker;

class SiteManager extends Controller
{
    public function getAllSites()
    {
        $sites = Site::all();
        
        return $sites;
    }

    public function addSite(Request $request)
    {
        if (!FieldChecker::isValidName($request->site_name))
            return false;
            
        try {
            $site = new Site;
            $site->site_name = $request->site_name;
            $site->customer_id = $request->customer_id;
            $site->save();
            return true;
        }

        catch (\Exception $exception)
        {
            return false;
        }
    }

    public function updateSite(Request $request)
    {
        if (!FieldChecker::isValidName($request->site_name))
            return false;

        try {
            $site = \App\Models\Site::find($request->site_id);
            $site->site_name = $request->site_name;
            $site->customer_id = $request->customer_id;
            $site->save();

            return true;
        }

        catch (\Exception $exception)
        {
            return false;
        }

    }

    public function getSiteById(int $id)
    {
        try {
            $site = \App\Models\Site::find($id);
            return $site;
        }

        catch (\Exception $e) {
            return false;
        }
    }

    private function addSiteData(Site $site, Request $request)
    {
        // return $this->addSiteData(new Site, $request);
        
        // return $this->addSiteData(\App\Models\Site::find($request->site_id), $request);

        if (!FieldChecker::isValidName($request->site_name))
            return false;

        try {
            $site->site_name = $request->site_name;
            $site->customer_id = $request->customer_id;
            $site->save();

            return true;
        }

        catch (\Exception $exception)
        {
            return false;
        }
    }

    public function deleteSite(int $id)
    {
        try {
            $site = Site::find($id);
            $site->delete();
            return true;
        }

        catch (\Exception $e) {
            return false;
        }
    }
}