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
        $valid = FieldChecker::isValidSiteName($request->name);
        
        if (!$valid)
            return false;
            
        try {
            $site = new Site;
            $site->name = $request->name;
            $site->customerId = $request->customerId;
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
        $valid = FieldChecker::isValidSiteName($request->name);
        
        if (!$valid){
            return false;
        }

        try {


            $site = Site::find($request->siteId);
            $site->name = $request->name;
            $site->customerId = $request->customerId;
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
            $site = Site::find($id);
            return $site;
        }

        catch (\Exception $e) {
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

