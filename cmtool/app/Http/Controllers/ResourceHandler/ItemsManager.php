<?php

namespace App\Http\Controllers\ResourceHandler;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Customer;

class ItemsManager
{
    public function deleteItemById($itemId)
    {
        $item = Item::where('item_id', $itemId);
        $item->delete();

        return true;
    }

    public function addItem($request, int $siteId, int $customerId)
    {
        return $this->saveItem(new Item, $request, $siteId, $customerId);
    }

    public function updateItemDetails($request, int $itemId, int $siteId, int $customerId)
    {
        return $this->saveItem(Item::find($itemId), $request, $siteId, $customerId);
    }

    private function saveItem(Item $items, Request $request, int $siteId, int $customerId)
    {
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

    public function getItemDetails($itemId)
    {
        $item = Item::all()
            ->where('item_id', '=', $itemId)
            ->last();
        
        return $item;
    }

    public function getItemsByCustomerId(int $customerId)
    {
        $items = Item::all()
            ->where('customer_id', '=', $customerId);
        return $items;
    }  
}
