<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Customer;

use DB;

class CustomersManager extends Controller
{
    public function getCustomerDropdownList()
    {
        $customerDropdownList = Customer::all()
            ->pluck('customer_name', 'customer_id');
        
        return $customerDropdownList;
    }

    public function getCustomerId($itemId)
    {
        $equipmentId = DB::table('equipment')
            ->select('customerId')
            ->where('id', '=', $itemId)
            ->first();
        $url = $equipmentId->customerId;

        return $url;
    }

    public function getCustomerList() {

        $customers = Customer::all();

        return $customers;
    }

    public function getCustomerById(int $id) {

        $customer = DB::table('customers')
                ->select('*')
                ->where('customer_id', '=', $id)
                ->first();

        return $customer;
    }

    public function updateCustomer() {

    }

    public function deleteCustomer(int $id) {

        $customer = DB::table('customers')
                ->select('*')
                ->where('customer_id', '=', $id)
                ->first();
        
        if ($customer) {
            $customer = DB::table('customers')
                ->select('*')
                ->where('customer_id', '=', $id)
                ->delete();

                return true;
        }
        else {
            dd("no data.");
        } 
    }
}
