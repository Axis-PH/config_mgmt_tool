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

