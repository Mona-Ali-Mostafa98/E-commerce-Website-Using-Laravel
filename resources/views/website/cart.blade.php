@extends('website.layout')
@section('content')
    @include('admin.alerts')

    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('website.cart.update') }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th class="li-product-remove">remove</th> --}}
                                        <th class="li-product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="li-product-price">Unit Price</th>
                                        <th class="li-product-quantity">Quantity</th>
                                        <th class="li-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cart_items as $cart_item)
                                        <tr>
                                            {{-- <td class="li-product-remove">
                                                <form action="{{ route('website.cart.destroy', $cart_item->product_id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"><i class="fa fa-times"></i></button>
                                                </form>
                                            </td> --}}
                                            <td class="li-product-thumbnail"><a href="#"><img
                                                        src="{{ asset('images/' . $cart_item->product->image) }}"
                                                        width="100px" height="100px" alt="Li's Product Image"></a>
                                            </td>
                                            <td class="li-product-name"><a
                                                    href="#">{{ $cart_item->product->name }}</a>
                                            </td>
                                            <td class="li-product-price"><span
                                                    class="amount">${{ $cart_item->product->final_price }}</span></td>
                                            <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    {{-- name is an array because we may  update quantity of more product --}}
                                                    <input class="cart-plus-minus-box"
                                                        name="quantity[{{ $cart_item->product_id }}]"
                                                        value="{{ $cart_item->quantity }}" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span
                                                    class="amount">${{ $cart_item->product->final_price * $cart_item->quantity }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-muted fs-4" colspan="5">
                                                <h4>There are no products at cart....</h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value=""
                                            placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <div class="coupon2">
                                        <button type="submit"
                                            onclick="return confirm('Are you sure you want to update your cart?')">Update
                                            cart</button>
                    </form>

                    <form action="{{ route('website.cart.destroy') }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure you want to clear your cart?')">Clear
                            cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 ml-auto">
            <div class="cart-page-total">
                <h2>Cart totals</h2>
                <ul>
                    <li>Subtotal <span>${{ $sub_total }}</span></li>
                    <li>Tax <span>${{ $tax }}</span></li>
                    <li>Total <span>${{ $total }}</span></li>
                </ul>
                <form action="{{ route('website.checkout') }}" method="post">
                    @csrf
                    <div class="coupon-all ">
                        <button type="submit">Proceed to checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!--Shopping Cart Area End-->
@endsection
