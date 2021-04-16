<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Customer;

use DB;

class CustomerManager extends Controller
{
    public function getCustomerDropdownList()
    {
        $customerDropdownList = Customer::all()
            ->pluck('name', 'id');
        
        return $customerDropdownList;
    }

    public function getCustomerId($itemId)
    {
        $item = DB::table('item')
            ->select('customer_id')
            ->where('item_id', '=', $itemId)
            ->first();
        $url = $item->customer_id;

        return $url;
    }
}
