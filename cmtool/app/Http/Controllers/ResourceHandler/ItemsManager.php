<?php

namespace App\Http\Controllers\ResourceHandler;

use Illuminate\Http\Request;
use Facades\App\Helper\FieldChecker;
use App\Models\Item;
use App\Models\Customer;
use DB;

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

    public function checkItems($request)
    {
        if (!FieldChecker::isValidName($request->itemName) or 
            !FieldChecker::isValidName($request->model) or
            !FieldChecker::isValidName($request->serialNumber) or
            !FieldChecker::isValidName($request->ipAddress) or
            !FieldChecker::isValidName($request->netmask) or
            !FieldChecker::isValidName($request->gateway) or
            !FieldChecker::isValidName($request->installationLocation))
            return false;
        else
            return true;
    }

    private function saveItem(Item $items, Request $request, int $siteId, int $customerId)
    {
        if(!$this->checkItems($request))
        {
            return false;
        }
        else
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
    }

    public function getItemDetails($itemId)
    {
        $item = Item::all()
            ->where('item_id', '=', $itemId)
            ->last();
        
        return $item;
    }

    public function getAllItems(int $siteId, int $customerId)
    {
        $items = DB::table('items')
        ->select('item_id', 'item_name', 'category', 'customer_id', 'maker_id')
        ->where('customer_id', '=', $customerId)
        ->where('site_id', '=', $siteId)
        ->simplePaginate(5);

        return $items;
    }  
}
