<?php

namespace App\Http\Controllers\ResourceHandler;

use DB;

class CustomerManager
{
    public function getCustomerId($itemId)
    {
        $equipmentId = DB::table('equipment')
            ->select('customerId')
            ->where('id', '=', $itemId)
            ->first();
        $url = $equipmentId->customerId;

        return $url;
    }
}
