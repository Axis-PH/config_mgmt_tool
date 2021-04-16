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
        $maker = Maker::find($id);
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
        $valid = FieldChecker::isValidSiteName($request->name);
        
        if (!$valid)
            return false;
            
        try {
            $maker = new Maker;
            $maker->name = $request->name;
            $maker->namePIC = $request->namePIC;
            $maker->telephoneNumber = $request->telephoneNumber;
            $maker->email = $request->email;
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
        $valid = FieldChecker::isValidSiteName($request->name);
        
        if (!$valid){
            return false;
        }

        try {
            $maker = Maker::find($request->makerId);
            $maker->name = $request->name;
            $maker->namePIC = $request->namePIC;
            $maker->telephoneNumber = $request->telephoneNumber;
            $maker->email = $request->email;
            $maker->save();

            return true;
        }

        catch (\Exception $exception)
        {
            return false;
        }
    }
}

