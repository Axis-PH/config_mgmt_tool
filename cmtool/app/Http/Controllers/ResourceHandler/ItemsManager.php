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
        try {
        $item = Item::where('item_id', $itemId);
        $item->delete();

        return true;
        }
        
        catch (\Exception $e)
        {
            return false;
        }  
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
        // if (FieldChecker::isNotBlankField($request->itemName) or 
        //     FieldChecker::isNotBlankField($request->model) or
        //     FieldChecker::isNotBlankField($request->ipAddress) or
        //     FieldChecker::isNotBlankField($request->netmask) or
        //     FieldChecker::isNotBlankField($request->gateway) or
        //     FieldChecker::isNotBlankField($request->remarks))
        // { 
        //     return true;
        // }
        // else
        //     return false;

        if (!FieldChecker::isNotBlankField($request->itemName))
            return __('item.errorMessageName');

        if (!FieldChecker::isNotBlankField($request->model))
            return __('item.errorMessageModel');

        if (!FieldChecker::isNotBlankField($request->ipAddress))
            return __('item.errorMessageIP');

        if (!FieldChecker::isNotBlankField($request->netmask))
            return __('item.errorMessageNetmask');
            
        if (!FieldChecker::isNotBlankField($request->gateway))
            return __('item.errorMessageGateway');

        if (!FieldChecker::isNotBlankField($request->remarks))
            return __('item.errorMessageRemarks');

        return 'true';
    }

    private function saveItem(Item $items, Request $request, int $siteId, int $customerId)
    {
        // if(!$this->checkItems($request))
        // {
        //     return false;
        // }
        if($this->checkItems($request) != 'true')
        {
            return $this->checkItems($request);
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
        ->leftJoin('categories', 'items.category', '=', 'categories.category_id')
        ->leftJoin('customers', 'items.customer_id', '=', 'customers.customer_id')
        ->leftJoin('makers', 'items.maker_id', '=', 'makers.maker_id')
        ->select('items.item_id as itemId', 'items.item_name as itemName', 
            'categories.category_name as categoryName', 'customers.customer_name as customerName', 
            'makers.maker_name as makerName')
        ->where('items.customer_id', '=', $customerId)
        ->where('items.site_id', '=', $siteId)
        ->simplePaginate(5);

        return $items;
    }  
}
