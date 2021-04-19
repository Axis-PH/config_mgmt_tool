<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomersManager extends Controller
{
    public function getCustomerDropdownList()
    {
        $customerDropdownList = Customer::all()
            ->pluck('customer_name', 'customer_id');
        
        return $customerDropdownList;
    }
}

