<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use App\Checkout;
use App\Order;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Support\Facades\Session;
use Cart;

class ShopController extends MainController
{
    public function categories()
    {

        self::$viewData['categories'] = Categorie::all()->toArray();
        self::$viewData['page_title'] .= ' Shop Categories';
        return view('categories', self::$viewData);
    }


    public function products(Request $request, $curl)
    {
        //\Cart::clear(); // #to delete items from cart for delvelopment
        Product::getProducts($curl, self::$viewData, $request);
        return view('products', self::$viewData);
    }

    public function item($curl, $purl)
    {
        Product::getItem($purl, self::$viewData);
        return view('item', self::$viewData);
    }

    public function addToCart(Request $request)
    {
        Product::addToCart($request['pid']);
    }

    public function cart()
    {
        self::$viewData['page_title'] .= ' Shop Cart';
        $cart = Cart::getContent()->toArray();
        sort($cart);
        self::$viewData['cart'] = $cart;
        return view('cart', self::$viewData);
    }

    public function clearCart()
    {
        Cart::clear();
        return redirect('shop/cart');
    }

    public function removeItem($pid)
    {
        Cart::remove($pid);
        Session::flash('sm', 'The crystal was deleted');
        return redirect('shop/cart');
    }

    public function updateCart(Request $request)
    {
        Product::updateCart($request['pid'], $request['op']);
    }

    public function getCheckout()
    {
        if (Cart::isEmpty()) {
            return redirect('shop/cart');
        }

        if (!Session::has('user_id')) {
            return redirect('user/signup?rn=shop/cart');
        }
        self::$viewData['page_title'] .= ' Checkout Address';
        return view('checkout', self::$viewData);
    }

    public function postCheckout(CheckoutRequest $request)
    {
        Checkout::save_address($request);
        $lastOrderNum = Checkout::get_order_id($request);
        $orderNum = get_object_vars($lastOrderNum);
        $orderNum = $orderNum['aid'];

        return redirect('shop/checkout-review?ordern=' . $orderNum);
    }

    public function getCheckoutReview()
    {
        if (Cart::isEmpty()) {
            return redirect('shop/cart');
        }
        if (!Session::has('user_id')) {
            return redirect('user/signup');
        }
        $cart = Cart::getContent()->toArray();
        sort($cart);
        self::$viewData['cart'] = $cart;
        self::$viewData['page_title'] .= ' Checkout Review';
        return view('checkout-review', self::$viewData);
    }

    public function postCheckoutReview(Request $request)
    {
        if (Cart::isEmpty()) {
            return redirect('shop/cart');
        }

        if (!Session::has('user_id')) {
            return redirect('user/signup?rn=shop/cart');
        }

        Order::save_new($request);
        Cart::clear();
        return redirect('shop/order-confirmed');
    }

    public function orderConfirmed()
    {
        self::$viewData['page_title'] .= ' Order Confirmed';
        return view('order-confirmed', self::$viewData);
    }
}