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
        $customerId = $item->customer_id;

        return $customerId;
    }

    public function getCustomerName($customerId)
    {
        $customerName = DB::table('customers')
        ->select('customer_name')
        ->where('customer_id', '=', $customerId)
        ->first();       
        
        return $customerName->customer_name;
    }

    public function getAllCustomer() {

        $customers = Customer::simplePaginate(5);

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

        $status = 'update';
        return $this->saveCustomer(Customer::find($request->customer_id), $request, $status);
    }

    public function deleteCustomer(int $id) {

        $customer = DB::table('customers')
                ->select('*')
                ->where('customer_id', '=', $id)
                ->first();
        
        if ($customer) {

            try {
                $customer = DB::table('customers')
                ->select('*')
                ->where('customer_id', '=', $id)
                ->delete();

                return true;
            }
            catch (\Exception $exception) {
                return false;
            }
        }
        else {

            dd("no data.");
        } 
    }

    public function addCustomer($request) {

        $status = 'add';
        return $this->saveCustomer(new Customer, $request, $status);
    }

    public function saveCustomer(Customer $customer, $request, $status) {

       if ($this->getFieldChecker($request) == false) {
            return false;
       }

        if ($status == 'add') {

            $customerRecord = DB::table('customers')
                ->orderBy('customer_id')
                ->get()
                ->last();
            
            if ($customerRecord == null) {
                try {
                    $customer->customer_id = 1;
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
                try {
                        $customer->customer_id = $this->getLastCustomerId();
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
        }
        else if ($status == 'update') {
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

        if ($customer == null) {
            return 1;
        }

        return $customer->customer_id + 1;
    }

    private function getFieldChecker($request) {

        if (!FieldChecker::isValidName($request->customer_name))
            return false;

        if (!FieldChecker::isValidName($request->customer_staff))
            return false;
    
        if (!FieldChecker::isValidTel($request->customer_tel))
            return false;

        if (!FieldChecker::isValidEmail($request->customer_mail))
            return false;

        return true;
    }
}
