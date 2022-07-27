<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Feature;
use App\Models\Product;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index()
    {
        $cart = Cart::with('product')->where('id', $this->getCartId())->orWhere('user_id', Auth::id())->get();
        $sub_total = $cart->sum(function($cart_item) {
            return $cart_item->quantity * $cart_item->product->sale_price;
        });

        $tax_ratio = 10 ;  // must come from DB from setting from column tax as % value
        $tax = $sub_total * $tax_ratio / 100;
        $total = $sub_total + $tax;

        return view('website.login-register', [
            'features'=> Feature::all(),
            'settings'=> Setting::first(),
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
        $data = $request->validate([
            'first_name' => ['required','string', 'max:255'],
            'last_name' => ['required','string', 'max:255'],
            'email' => ['required','string' , 'email','unique:users,email'],
            'password' => ['required', Password::min(8) ,'confirmed' ],

        ]);
        $user = User::create($data);
        auth()->login($user); //to register and make login

        return redirect()->route('website.index')
            ->with('success', "User $user->first_name $user->last_name created successfully");

    }

    public function login(Request $request)
    {
        $data = $request -> validate([              //global helpar method
            'email'=> 'required | email',
            'password'=> 'required | string',
        ]);

        if(!auth()->guard('web')-> attempt(['email'=> $data['email'],'password'=> $data['password']]))
        {
            return back();
        }
        else
        {
            return redirect(route('website.index'))
            ->with('success', "User login to website successfully");
        }
    }

    public function logout()
        {
            auth()->guard('web')-> logout() ;
            return redirect(route('website.login-register'));

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