<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Base;
use App\Models\Equipment;
use App\Http\Controllers\ResourceHandler\DataManager;
class PortalPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages/portal/landing');
    }

    public function customerList()
    {
        $bases = Base::all();
        return view('pages/portal/customerList')->with('bases', $bases);
    }

    public function item(int $itemId)
    {
        $equipment = Equipment::find($itemId);
        return view('pages/portal/item')->with('equipment', $equipment);
    }

    public function itemListByCustomerId(int $customerId)
    {
        $customer = Customer::find($customerId);
        return view('pages/portal/itemList')->with('equipments', $customer->equipments);
    }

    public function deleteDevice(int $itemId)
    {
        $dataManager = new DataManager;
        $url = $dataManager->getCustomerIdByItemId($itemId);
        $status = $dataManager->DeleteDevice($itemId);
        
        if($status)
        {
            return redirect('itemList/'.$url)->with('success');
        }
    }

    public function createDevice()
    {
        return view('pages/portal/deviceCreation');
    }

    public function addDevice(Request $request)
    {
        $dataManager = new DataManager;
        $status = $dataManager->addDevice($request);

        if ($status)
            return redirect('itemList/'.$request->customerId)->with('success');
        else
            return redirect('itemList/'.$request->customerId)->with('error');
    }

    public function editDevice(int $id)
    {
        $dataManager = new DataManager;
        $equipment = $dataManager->getDeviceDetailsForUpdate($id);

        return view('pages/portal/deviceUpdate')->with('id', $id)->with('equipment', $equipment);
    }

    public function updateDevice(Request $request, int $id)
    {
        $dataManager = new DataManager;
        $status = $dataManager->editDeviceDetails($request, $id);

        if ($status)
            return redirect('itemList/'.$request->customerId)->with('success');
        else
            return redirect('itemList/'.$request->customerId)->with('error');        
    }

    public function itemList()
    {
        // $bases = Base::all();
        return view('pages/portal/itemList');
    }

    public function contactList()
    {
        $customers = Customer::all();
        // dd($customers);
        return view('pages/portal/contactList')->with('customers', $customers);
    }
}
