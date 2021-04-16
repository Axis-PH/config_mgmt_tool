<?php

namespace App\Http\Controllers\ResourceHandler;

use App\Models\Item;
use App\Models\Customer;

class ItemsManager
{
    public function DeleteItemById($itemId)
    {
        $item = Item::where('item_id', $itemId);
        $item->delete();

        return true;
    }

    public function addItem($request, int $siteId, int $customerId)
    {
        try {        
            $item = new Item;
            $item->item_name = $request->itemName;
            $item->category = $request->itemCategory;
            $item->model = $request->model;
            $item->serial = $request->serialNumber;
            $item->ip = $request->ipAddress;
            $item->netmask = $request->netmask;
            $item->gateway = $request->gateway;
            $item->customer_id = $customerId;
            $item->site_id = $siteId;
            $item->place = $request->installationLocation;
            $item->maker_id = $request->makerId;
            $item->memo = $request->remarks;
            $item->save();
            return true;
        }
        catch (\Exception $e)
        {
            return false;
        }        
    }

    public function getItemDetails($itemId)
    {
        $item = Item::all()
            ->where('item_id', '=', $itemId)
            ->last();
        
        return $item;
    }

    public function updateItemDetails($request, int $id, int $siteId, int $customerId)
    {
        $items = Item::all()
            ->where('item_id', '=', $id)
            ->last();
       
        try {        
            $items->item_name = $request->itemName;
            $items->category = $request->itemCategory;
            $items->model = $request->model;
            $items->serial = $request->serialNumber;
            $items->ip = $request->ipAddress;
            $items->netmask = $request->netmask;
            $items->gateway = $request->gateway;
            $items->customer_id = $customerId;
            $items->site_id = $siteId;
            $items->place = $request->installationLocation;
            $items->maker_id = $request->makerId;
            $items->memo = $request->remarks;
            $items->save();

            return true;
        }
        catch (\Exception $e)
        {
            return false;
        }     
    }  

    public function getItemsByCustomerId(int $customerId)
    {
        $items = Customer::find($customerId);

        return $items;
    }  
}
