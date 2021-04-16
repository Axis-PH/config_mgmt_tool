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
            ->pluck('name', 'id');
        
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

        $customer = Customer::find($id);
        return $customer;
    }

    public function updateCustomer() {

    }

    public function deleteCustomer(int $id) {

        $customer = Customer::all()->find($id);
        $customer->delete();

        return true;
    }
}
