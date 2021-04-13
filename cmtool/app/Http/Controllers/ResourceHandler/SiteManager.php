<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Site;

class SiteManager extends Controller
{
    public function getAllSites()
    {
        $sites = Site::all();
        
        return $sites;
    }

    public function addSite(Request $request)
    {
        try {
            $site = new Site;
            // dd($request->customerId);
            $site->name = $request->name;
            $site->customerId = $request->customerId;
            $site->save();
            // $user->employeeId = $request->username;
            // $status = true;
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

