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
        $item = DB::table('item')
            ->select('customer_id')
            ->where('item_id', '=', $itemId)
            ->first();
        $url = $item->customer_id;

        return $url;
    }

    public function getCustomerList() {

        //$customers = Customer::all();
        $customers = DB::table('customers')
            ->select('*')
            ->paginate(2);

        return $customers;
    }

    public function getCustomerById(int $id) {

        $customer = DB::table('customers')
                ->select('*')
                ->where('customer_id', '=', $id)
                ->first();

        return $customer;
    }

    public function updateCustomer($request) {

        $customer = Customer::all()
            ->where('customer_id', '=', $request->customer_id)
            ->last();

        $customer->customer_name = $request->customer_name;
        $customer->customer_staff = $request->customer_staff;
        $customer->customer_tel = $request->customer_tel;
        $customer->customer_mail = $request->customer_mail;
        $customer->customer_memo = $request->customer_memo;
        $customer->save();
        return true;
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

    public function addCustomer($request) {

        $this->isCustomerToFillNull($request);

        $customer = new Customer;
        $customer->customer_id = $this->getLastCustomerId() + 1;
        $customer->customer_name = $request->customer_name;
        $customer->customer_staff = $request->customer_staff;
        $customer->customer_tel = $request->customer_tel;
        $customer->customer_mail = $request->customer_mail;
        $customer->customer_memo = $request->customer_memo;
        $customer->save();
        return true;
    }

    public function getLastCustomerId() {

        $customer = DB::table('customers')
            ->orderBy('customer_id')
            ->get()
            ->last();

        return $customer->customer_id;
    }
}
