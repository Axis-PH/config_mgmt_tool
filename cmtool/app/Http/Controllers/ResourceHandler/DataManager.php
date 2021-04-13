<?php

namespace App\Http\Controllers\ResourceHandler;

use App\Http\Controllers\ResourceHandler\DeviceManager;
use App\Http\Controllers\ResourceHandler\CustomerManager;

class DataManager
{
    public function DeleteDevice($itemId)
    {
        $deviceManager = new DeviceManager;
        $status = $deviceManager->DeleteItemById($itemId);

        if($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }

    public function getCustomerIdByItemId($itemId)
    {
        $customerManager = new CustomerManager;
        $url = $customerManager->getCustomerId($itemId);

        if($url)
        {
            return $url;
        }
        else
        {
            return null;
        }
    }

    public function addDevice($request)
    {
        $deviceManager = new DeviceManager;
        $status = $deviceManager->createDevice($request);

        if($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }

    public function getDeviceDetailsForUpdate($id)
    {
        $deviceManager = new DeviceManager;
        $status = $deviceManager->getDeviceDetails($id);

        if($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }

    public function editDeviceDetails($request, int $id)
    {
        $deviceManager = new DeviceManager;
        $status = $deviceManager->updateDeviceDetails($request, $id);

        if($status)
        {
            return $status;
        }
        else
        {
            return null;
        }
    }
}
