<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Base;
use App\Models\Equipment;
use App\Http\Controllers\ResourceHandler\DeviceManager;
use DB;
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
        //line 55 to 58 is temporary, will move to customerManager after Edit Device implementation
        $equipmentId = DB::table('equipment')
        ->select('customerId')
        ->where('id', '=', $itemId)
        ->first();

        $url = $equipmentId->customerId;
        $deviceManager = new DeviceManager;
        $status = $deviceManager->DeleteItemById($itemId);
        $equipment = Equipment::find($itemId);

        if($status)
        {
            return redirect('itemList/'.$url)->with('success');
        }
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
