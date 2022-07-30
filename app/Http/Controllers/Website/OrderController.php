<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Feature;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Order $order)
    {
        $cart = Cart::with('product')->where('id', $this->getCartId())->orWhere('user_id', Auth::id())->get();
        $sub_total = $cart->sum(function($cart_item) {
            return $cart_item->quantity * $cart_item->product->sale_price;
        });

        $tax_ratio = 10 ;  // must come from DB from setting from column tax as % value
        $tax = $sub_total * $tax_ratio / 100;
        $total = $sub_total + $tax;

        $user = Auth::user();
        $orders = $user->orders;
        //$user = Auth::user();
        //$order = $user->orders()
        if (Auth::id() != $order->user_id) {
            abort(404);
        }
        return view('website.order-show', [
            'order' => $order,

            'products'=> Product::all(),
            'features'=> Feature::all(),
            'settings'=> Setting::first(),
            'social_links'=> SocialLink::all(),

            'cart_items'=> $cart ,
            'cart_items_count'=> $cart->sum('quantity'),
            'sub_total' => $sub_total,
            'total' => $total,
            'tax' => $tax,
            'orders' => $orders,
        ]);
    }

     protected function getCartId()
    {
        $id = request()->cookie('cart_id');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_id', $id, 60 * 24 * 7);
        }
        return $id;
    }
}
