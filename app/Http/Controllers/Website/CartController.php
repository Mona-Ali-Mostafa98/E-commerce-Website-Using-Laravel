<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::with('product')->where('id', $this->getCartId())->orWhere('user_id', Auth::id())->get();

        $sub_total = $cart->sum(function($cart_item) {
            return $cart_item->quantity * $cart_item->product->final_price;
        });

        $settings = Setting::first() ;
        $tax_ratio = $settings->tax ;
        $tax = $sub_total * $tax_ratio / 100;
        $total = $sub_total + $tax ;

        return view('website.cart',[
            'products'=> Product::all(),
            'features'=> Feature::all(),
            'settings'=> $settings,
            'social_links'=> SocialLink::all(),
            'cart_items'=> $cart ,
            'cart_items_count'=> $cart->sum('quantity'),
            'sub_total' => $sub_total,
            'total' => $total,
            'tax' => $tax,
            
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['int', 'min:1'],
        ]);

        $cart = Cart::updateOrCreate([
            'id' => $this->getCartId(),
            'product_id' => $request->post('product_id'),
        ], [
            'quantity' => DB::raw('quantity + ' . $request->post('quantity', 1)),
            'user_id' => Auth::id(),
        ]);

        $product_name = $cart->product->name; //from relation

        return redirect()->back()->with('success', "Product '$product_name' added to cart successfully");

    }

    public function update(Request $request)
    {
        $request->validate([
            'quantity' => ['required', 'array'],
        ]);

        $that = $this;
        foreach ($request->post('quantity') as $product_id => $quantity) {
            Cart::where('product_id', $product_id)
                ->where(function($query) use ($that) {
                    $query->where('id', '=', $that->getCartId())
                        ->orWhere('user_id', '=', Auth::id());
                })
            ->update([
                'quantity' => $quantity,
            ]);
        }
        return redirect()->back()->with('success', "Cart updated successfully");
        
    }

    public function destroy()
    {
        Cart::where('id', '=', $this->getCartId())->orWhere('user_id', Auth::id())->delete();
        $cookie = Cookie::make('cart_id', '', -60);
        return redirect()->back()->with('success', "Cart cleared successfully")->cookie($cookie);
    }

    // This function to create unique id for cart to store it in cookie
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