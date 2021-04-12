<?php

namespace App\Http\Controllers\ResourceHandler;

use App\Models\Equipment;

class DeviceManager
{
    public function DeleteItemById($id)
    {
        $device = Equipment::all()->find($id);
        $device->delete();

        return true;
    }
}
