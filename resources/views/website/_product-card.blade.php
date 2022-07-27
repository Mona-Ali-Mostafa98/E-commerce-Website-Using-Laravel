<div class="col-lg-12">
    <!-- single-product-wrap start -->
    <div class="single-product-wrap">
        <div class="product-image">
            <a href="single-product.html">
                <img src="{{ asset('images/' . $product->image) }}" alt="Li's Product Image">
            </a>
            <span class="sticker">New</span>
        </div>
        <div class="product_desc">
            <div class="product_desc_info">
                <div class="product-review">
                    <h5 class="manufacturer">
                        <a href="shop-left-sidebar.html">{{ $product->category->name }}</a>
                    </h5>
                    <div class="rating-box">
                        <ul class="rating">
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                        </ul>
                    </div>
                </div>
                <h4><a class="product_name" href="single-product.html">{{ $product->name }}</a></h4>
                <div class="price-box">
                    <span class="new-price new-price-2">${{ $product->final_price }}</span>
                    @if ($product->sale_price)
                        <span class="old-price">${{ $product->price }} </span>
                    @endif
                    <span class="discount-percentage">-7%</span>
                </div>
            </div>
            <div class="add-actions">
                <ul class="add-actions-link">
                    <li class="add-cart active">
                        <form action="{{ route('website.cart.store') }}" method="post">
                            @csrf
                            <button type="submit" style="border: none ;" href="#" name="product_id"
                                value="{{ $product->id }}">Add to cart</button>
                        </form>
                    </li>
                    <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                    <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal"
                            data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- single-product-wrap end -->
</div>
