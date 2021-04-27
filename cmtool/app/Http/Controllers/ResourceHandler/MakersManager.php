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
        return $this->saveMaker(new Maker, $request);
    }

    public function updateMaker(Request $request)
    {
        return $this->saveMaker(Maker::find($request->maker_id), $request);
    }

    public function saveMaker(Maker $maker, $request)
    {
        $status = $this->areFieldsValid($request);

        if ($status != 'true')
            return $status;

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

    private function areFieldsValid(Request $request)
    {
        if (!FieldChecker::isValidName($request->maker_name))
            return 'Invalid Name';

        if (!FieldChecker::isValidName($request->maker_staff))
            return 'Invalid Staff Name';
    
        if (!FieldChecker::isValidTel($request->maker_tel))
            return 'Invalid Tel';
    
        if (!FieldChecker::isValidEmail($request->maker_mail))
            return 'Invalid Mail';

        return 'true';
    }

    public function getMakerName($makerId)
    {
        $maker = DB::table('makers')
            ->select('maker_name')
            ->where('maker_id', '=', $makerId)
            ->first();       
        
        return $maker->maker_name;
    }

    public function getMakersDropdownList()
    {
        $makersDropdownList = Maker::all()
            ->pluck('maker_name', 'maker_id');
        
        return $makersDropdownList;
    }    
}

