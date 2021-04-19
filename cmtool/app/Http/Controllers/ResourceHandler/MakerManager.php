<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Maker;

use Facades\App\Helper\FieldChecker;

class MakerManager extends Controller
{
    public function getAllMakers()
    {
        $makers = Maker::all();
        return $makers;
    }

    public function getMakerById(int $id)
    {
        $maker = \App\Models\Maker::find($id);
        return $maker;
    }

    public function deleteMaker(int $id)
    {
        try {
            $maker = Maker::find($id);
            $maker->delete();
            return true;
        }

        catch (\Exception $exception)
        {
            return false;
        }
    }

    public function addMaker(Request $request)
    {
        $valid = FieldChecker::isValidSiteName($request->maker_name);
        
        if (!$valid)
            return false;
            
        try {
            $maker = new Maker;
            $maker->maker_name = $request->maker_name;
            $maker->maker_staff = $request->maker_staff;
            $maker->maker_tel = $request->maker_tel;
            $maker->maker_mail = $request->maker_mail;
            $maker->save();
            return true;
        }

        catch (\Exception $exception)
        {
            return false;
        }
    }

    public function updateMaker(Request $request)
    {
        $valid = FieldChecker::isValidSiteName($request->maker_name);
        
        if (!$valid){
            return false;
        }

        try {
            $maker = \App\Models\Maker::find($request->maker_id);
            $maker->maker_name = $request->maker_name;
            $maker->maker_staff = $request->maker_staff;
            $maker->maker_tel = $request->maker_tel;
            $maker->maker_mail = $request->maker_mail;
            $maker->save();

            return true;
        }

        catch (\Exception $exception)
        {
            return false;
        }
    }
}

