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

    public function addDevice($request)
    {
        try {        
            $equipment = new Equipment;
            $equipment->name = $request->deviceName;
            $equipment->equipmentClassificationId = $request->deviceClassificationNumber;
            $equipment->model = $request->model;
            $equipment->serialNumber = $request->serialNumber;
            $equipment->ipAddress = $request->ipAddress;
            $equipment->netmask = $request->netmask;
            $equipment->gateway = $request->gateway;
            $equipment->customerId = $request->customerId;
            $equipment->baseId = $request->siteId;
            $equipment->installationLocation = $request->installationLocation;
            $equipment->makerId = $request->makerId;
            $equipment->remarks = $request->remarks;
            $equipment->save();
            return true;
        }
        catch (\Exception $e)
        {
            return false;
        }        
    }

    public function getDeviceDetails($id)
    {
        $device = Equipment::all()
            ->where('id', '=', $id)
            ->last();

        return $device;
    }

    public function updateDeviceDetails($request, int $id)
    {
        $equipment = Equipment::all()
            ->where('id', '=', $id)
            ->last();
        try {        
            $equipment->name = $request->deviceName;
            $equipment->equipmentClassificationId = $request->deviceClassificationNumber;
            $equipment->model = $request->model;
            $equipment->serialNumber = $request->serialNumber;
            $equipment->ipAddress = $request->ipAddress;
            $equipment->netmask = $request->netmask;
            $equipment->gateway = $request->gateway;
            $equipment->customerId = $request->customerId;
            $equipment->baseId = $request->siteId;
            $equipment->installationLocation = $request->installationLocation;
            $equipment->makerId = $request->makerId;
            $equipment->remarks = $request->remarks;
            $equipment->save();

            return true;
        }
        catch (\Exception $e)
        {
            return false;
        }     
    }    
}
