<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class CmsController extends MainController
{


    public function dashboard()
    {

        return view('cms.dashboard', self::$viewData);
    }

    public function orders()
    {
        self::$viewData['orders'] = Order::getOrders()->toArray();;
        return view('cms.orders', self::$viewData);
    }

    public function order($id)
    {
        self::$viewData['order'] = Order::getOrder($id)->toArray();
        return view('cms.order_details', self::$viewData);
    }
}