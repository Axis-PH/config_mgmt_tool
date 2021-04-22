<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Maker;
use DB;

use Facades\App\Helper\FieldChecker;

class MakersManager extends Controller
{
    public function getAllMakers()
    {
        $makers = Maker::simplePaginate(5);
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
        return $this->saveMaker(new Maker, $request);
        // $valid = FieldChecker::isValidName($request->maker_name);
        
        // if (!$valid)
        //     return false;
            
        // try {
        //     $maker = new Maker;
        //     $maker->maker_name = $request->maker_name;
        //     $maker->maker_staff = $request->maker_staff;
        //     $maker->maker_tel = $request->maker_tel;
        //     $maker->maker_mail = $request->maker_mail;
        //     $maker->save();
        //     return true;
        // }

        // catch (\Exception $exception)
        // {
        //     return false;
        // }
    }

    public function updateMaker(Request $request)
    {
        return $this->saveMaker(Maker::find($request->maker_id), $request);

        // if (!FieldChecker::isValidName($request->maker_name))
        //     return false;

        // if (!FieldChecker::isValidName($request->maker_staff))
        //     return false;
    
        // if (!FieldChecker::isValidTel($request->maker_tel))
        //     return false;

        // try {
        //     $maker = \App\Models\Maker::find($request->maker_id);
        //     $maker->maker_name = $request->maker_name;
        //     $maker->maker_staff = $request->maker_staff;
        //     $maker->maker_tel = $request->maker_tel;
        //     $maker->maker_mail = $request->maker_mail;
        //     $maker->save();

        //     return true;
        // }

        // catch (\Exception $exception)
        // {
        //     return false;
        // }
    }

    public function saveMaker(Maker $maker, $request)
    {

        if (!FieldChecker::isValidName($request->maker_name))
            return false;

        if (!FieldChecker::isValidName($request->maker_staff))
            return false;
    
        if (!FieldChecker::isValidTel($request->maker_tel))
            return false;

        try {
            $maker->maker_name = $request->maker_name;
            $maker->maker_staff = $request->maker_staff;
            $maker->maker_tel = $request->maker_tel;
            $maker->maker_mail = $request->maker_mail;
            $maker->hp_address = $request->hp_address;
            $maker->maker_memo = $request->maker_memo;
            $maker->save();

            return true;
        }

        catch (\Exception $exception)
        {
            dd($exception->getMessage());
            return false;
        }
    }

    public function getMakerName($makerId)
    {
        $makerName = DB::table('makers')
        ->select('maker_name')
        ->where('maker_id', '=', $makerId)
        ->first();       
        
        return $makerName->maker_name;
    }

    public function getMakersDropdownList()
    {
        $makersDropdownList = Maker::all()
            ->pluck('maker_name', 'maker_id');
        
        return $makersDropdownList;
    }    
}

