<div class="cr-product-csc cr-product-card">
    <div class="cr-product-image">
        <div class="cr-image-inner">
            {{-- {{ url('/product/' . $item->slug) }} --}}
            <img src="{{ asset('public/products/' . $item->thumbnail_img) }}" alt="product-3">


            <div class="cr-side-view">
                @if (Session::has('user_id'))
                    <a href="javascript:void(0)" class="wishlist" data-tip="Add to Wishlist"
                        data-id="{{ $item->id }}">
                        <i class="ri-heart-line"></i>
                    </a>
                @else
                <li><a href="{{ url('user_login') }}" data-tip="Add to Wishlist" data-id="{{ $item->id }}"><i
                    class="far fa-heart"></i></a></li>
                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                        <i class="ri-eye-line"></i>
                    </a>
                @endif
            </div>
        </div>
        <a class="cr-shopping-bag remove-cart" href="javascript:void(0)" data-id="{{$item->id}}">
            <i class="ri-shopping-bag-line"></i>
        </a>
    </div>
    <div class="cr-product-details">
        <a href="{{ url('/product/' . $item->slug) }}" class="title">{{ substr($item->product_name, 0, 25) . '...' }}</a>
        <p>{{ $item->brand_name }}</p>
        @php $product_rating = product_rating($item->id);  @endphp
        <div class="cr-star">
            @php $rating = 0;  @endphp
            @if ($product_rating->rating_col > 0)
                @php $rating = ceil($product_rating->rating_sum/$product_rating->rating_col);  @endphp
            @endif
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $rating)
                    <i class="ri-star-fill"></i>
                @else
                    <i class="ri-star-fill"></i>
                @endif
            @endfor

        </div>
        @php $product_price = get_product_price($item->id); @endphp
        @if ($product_price->discount != '')
            <span class="product-discount-label">-{{ $product_price->discount }}</span>
        @endif
        <p class="cr-price">
            @if ($product_price->discount != '')
                <span class="old-price">{{ site_settings()->currency }}{{ $product_price->old_price }}</span>
        </p>
        @endif
        <span class="new-price">{{ site_settings()->currency }}{{ $product_price->new_price }}</span>

    </div>
</div>

