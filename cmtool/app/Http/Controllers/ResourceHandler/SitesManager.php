<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Item;
use Facades\App\Helper\FieldChecker;
use DB;

class SitesManager extends Controller
{
    public function getAllSites()
    {
        $sites = Site::simplePaginate(5);
        
        return $sites;
    }

    public function addSite(Request $request)
    {
        return $this->saveSite(new Site, $request);
    }

    public function updateSite(Request $request)
    {
        return $this->saveSite(Site::find($request->site_id), $request);
    }

    private function saveSite(Site $site, Request $request)
    {
        if (!FieldChecker::isValidName($request->site_name))
            return __('site.errorMessageSite');

        if (!FieldChecker::isNotBlankField($request->site_name))
            return __('site.errorMessageSite');

        if (!FieldChecker::isNotBlankField($request->customer_id))
            return __('site.errorMessageCustomer');

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

    public function getSiteIdByItemId(int $itemId)
    {
        $item = Item::find($itemId);
        $site = $item->site_id;
        return $site;
    }  

    public function getSiteName(int $siteId)
    {
        $site = DB::table('sites')
        ->select('site_name')
        ->where('site_id', '=', $siteId)
        ->first();       
        
        return $site->site_name;
    } 
}

