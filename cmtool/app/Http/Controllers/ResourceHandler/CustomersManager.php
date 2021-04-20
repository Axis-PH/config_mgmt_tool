<?php

namespace App\Http\Controllers\ResourceHandler;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Customer;

use Facades\App\Helper\FieldChecker;

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
        $item = DB::table('items')
            ->select('customer_id')
            ->where('item_id', '=', $itemId)
            ->first();
        $url = $item->customer_id;

        return $url;
    }

    public function getCustomerList() {

        $customers = Customer::simplePaginate(5);
        // $customers = DB::table('customers')
        //     ->select('*')
        //     ->paginate(5);

        return $customers;
    }

    public function getCustomerById(int $id) {

        $customer = DB::table('customers')
                ->select('*')
                ->where('customer_id', '=', $id)
                ->first();

        return $customer;
    }

    public function updateCustomer($request, string $updateStatus, string $addStatus) {

        return $this->saveCustomer(Customer::find($request->customer_id), $request, $addStatus, $updateStatus);
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

    public function addCustomer($request, string $updateStatus, string $addStatus) {

        return $this->saveCustomer(new Customer, $request, $addStatus, $updateStatus);
    }

    public function saveCustomer(Customer $customer, $request, $addStatus, $updateStatus) {

        if (!FieldChecker::isValidName($request->customer_name))
            return false;

        if (!FieldChecker::isValidName($request->customer_staff))
            return false;
    
        if (!FieldChecker::isValidTel($request->customer_tel))
            return false;

        if (!FieldChecker::isValidEmail($request->customer_mail))
            return false;

        if ($addStatus == true) {
            try {
                $customer->customer_id = $this->getLastCustomerId() + 1;
                $customer->customer_name = $request->customer_name;
                $customer->customer_staff = $request->customer_staff;
                $customer->customer_tel = $request->customer_tel;
                $customer->customer_mail = $request->customer_mail;
                $customer->customer_memo = $request->customer_memo;
                $customer->save();
                return true;
            }
            catch (\Exception $exception) {
                return false;
            }
        }
        else if ($updateStatus == true) {
            try {
                $customer->customer_name = $request->customer_name;
                $customer->customer_staff = $request->customer_staff;
                $customer->customer_tel = $request->customer_tel;
                $customer->customer_mail = $request->customer_mail;
                $customer->customer_memo = $request->customer_memo;
                $customer->save();
                return true;
            }
            catch (\Exception $exception) {
                return false;
            }
        }
        else {
            return null;
        }
    }


    public function getLastCustomerId() {

        $customer = DB::table('customers')
            ->orderBy('customer_id')
            ->get()
            ->last();

        return $customer->customer_id;
    }
}
