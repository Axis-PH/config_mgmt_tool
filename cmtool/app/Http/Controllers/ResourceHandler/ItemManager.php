<?php

namespace App\Http\Controllers\ResourceHandler;

use App\Models\Equipment;

class ItemManager
{
    public function DeleteItemById($id)
    {
        $item = Equipment::all()->find($id);
        $item->delete();

        return true;
    }

    public function addItem($request, int $siteId, int $customerId)
    {
        try {        
            $item = new Equipment;
            $item->name = $request->itemName;
            $item->equipmentClassificationId = $request->itemCategory;
            $item->model = $request->model;
            $item->serialNumber = $request->serialNumber;
            $item->ipAddress = $request->ipAddress;
            $item->netmask = $request->netmask;
            $item->gateway = $request->gateway;
            $item->customerId = $customerId;
            $item->baseId = $siteId;
            $item->installationLocation = $request->installationLocation;
            $item->makerId = $request->makerId;
            $item->remarks = $request->remarks;
            $item->save();
            return true;
        }
        catch (\Exception $e)
        {
            return false;
        }        
    }

    public function getItemDetails($id)
    {
        $item = Equipment::all()
            ->where('id', '=', $id)
            ->last();

        return $item;
    }

    public function updateItemDetails($request, int $id, int $siteId, int $customerId)
    {
        $item = Equipment::all()
            ->where('id', '=', $id)
            ->last();
        try {        
            $item->name = $request->itemName;
            $item->equipmentClassificationId = $request->itemCategory;
            $item->model = $request->model;
            $item->serialNumber = $request->serialNumber;
            $item->ipAddress = $request->ipAddress;
            $item->netmask = $request->netmask;
            $item->gateway = $request->gateway;
            $item->customerId = $customerId;
            $item->baseId = $siteId;
            $item->installationLocation = $request->installationLocation;
            $item->makerId = $request->makerId;
            $item->remarks = $request->remarks;
            $item->save();

            return true;
        }
        catch (\Exception $e)
        {
            return false;
        }     
    }    
}
