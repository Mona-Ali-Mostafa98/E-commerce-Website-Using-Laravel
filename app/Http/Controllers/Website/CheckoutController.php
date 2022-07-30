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
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;


class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        return view('website.checkout',[
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

    public function store(Request $request)
    {
        $user = $request->user();
        $user_id = $user->id;
        $products = Cart::with('product')
            ->where('user_id', $user_id)
            ->orWhere('id', $request->cookie('cart_id'))
            ->get();

        if (!$products) {
            return redirect()->route('cart');
        }

        $total = $products->sum(function($item) {
            return $item->product->final_price * $item->quantity;
        });

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => $user_id,
                'total' => $total,
            ]);

            foreach ($products as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->final_price,
                ]);
            }

            Cart::where('user_id', $user_id)
                ->orWhere('id', $request->cookie('cart_id'))
                ->delete();

            DB::commit();

            return redirect()->route('website.checkout.index')->with('success', 'Order created');

        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }

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
