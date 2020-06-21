<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    static public function save_new($request)
    {
        $cart = Cart::getContent()->toJson();
        $cart = json_decode($cart, true);
        $num = Cart::getTotal() >= 300 ? 0 : 15;
        $order = new self();
        $order->aid = $request['ordern'];
        $order->data = serialize($cart);
        $order->total = Cart::getTotal() + Cart::getTotal() * 0.07 + $num;
        $order->save();
    }

    static public function getOrders()
    {
        return  DB::table('orders as o')
            ->join('checkouts as c', 'o.aid', '=', 'c.aid')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->select('o.*', 'c.*', 'u.name', 'u.email', 'u.country')
            ->get();
    }

    static public function getOrder($id)
    {
        return  DB::table('orders as o')
            ->join('checkouts as c', 'o.aid', '=', 'c.aid')
            ->join('users as u', 'c.user_id', '=', 'u.id')
            ->select('o.*', 'c.*', 'u.name', 'u.email', 'u.country')
            ->where('o.id', '=', $id)
            ->get();
    }
}