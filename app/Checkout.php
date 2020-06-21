<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Checkout extends Model
{
    static public function save_address($request)
    {
        $address = new self();
        $address->user_id = $request->session()->get('user_id');
        $address->city = strtolower($request['city']);
        $address->street = strtolower($request['street']);
        $address->state = $request['state'] ?? '-';
        $address->zip =  $request['zip'] ?? '-';
        $address->phone = $request['phone'];
        $address->paypal = isset($request['paypal']) ? $request['paypal'] : '-';
        $address->on_delivery = isset($request['on_delivery']) ? $request['on_delivery'] : '-';
        $address->save();
    }

    static public function get_order_id($request)
    {

        $aid = DB::table('checkouts as c')
            ->select('c.aid')
            ->orderBy('c.aid', 'desc')
            ->where('user_id', '=', $request->session()->get('user_id'))
            ->first();

        return $aid;
    }
}