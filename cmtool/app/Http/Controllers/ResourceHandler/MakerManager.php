<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Maker;

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
}

