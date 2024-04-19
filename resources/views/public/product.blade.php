@extends('public.layout')
@section('title', $product->product_name)
@section('content')
    <section class="section-breadcrumb">
        <div class="cr-breadcrumb-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cr-breadcrumb-title">
                            <h2>Product</h2>
                            <span> <a href="index.html">Home</a> - product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product -->
    <section class="section-product padding-t-100">
        <div class="container">
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-xxl-4 col-xl-5 col-md-6 col-12 mb-24">
                    <div class="vehicle-detail-banner banner-content clearfix">
                        <div class="banner-slider">
                            @php
                                $images = array_filter(explode(',', $product->gallery_img));
                            @endphp

                            <div class="slider slider-for">
                                @for ($i = 0; $i < count($images); $i++)
                                    <div class="slider-banner-image">
                                        <div class="zoom-image-hover">
                                            <img src="{{ asset('public/products/' . $images[$i]) }}" alt="product-tab-1"
                                                class="product-image">
                                        </div>
                                    </div>
                                @endfor
                            </div>

                            <div class="slider slider-nav thumb-image">
                                @for ($i = 0; $i < count($images); $i++)
                                    <div class="thumbnail-image">
                                        <div class="thumbImg">
                                            <img src="{{ asset('public/products/' . $images[$i]) }}" alt="product-tab-1">
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-7 col-md-6 col-12 mb-24">
                    <div class="cr-size-and-weight-contain">
                        <h2 class="heading">{{ $product->brand_name }}.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus sequi unde libero ea
                            odio aperiam ex alias quod? Tempora, magnam? Reprehenderit incidunt repudiandae officia eius
                            a ullam. Recusandae quia aliquid ratione est quis voluptatibus magni porro a.
                            Necessitatibus, tenetur ducimus.</p>
                    </div>
                    <div class="cr-size-and-weight">
                        <div class="cr-review-star">
                            <div class="cr-star">
                                @if ($product->rating_col > 0)
                                    @php $rating = ceil($product->rating_sum/$product->rating_col);  @endphp
                                @else
                                    @php $rating = 0;  @endphp
                                @endif
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $rating)
                                        <i class="ri-star-fill"></i>
                                    @else
                                        <i class="ri-star-fill"></i>
                                    @endif
                                @endfor


                            </div>
                            <p>({{ $product->rating_col }} reviews)</p>
                        </div>
                        <div class="list">
                            <ul>
                                <li><label>Brand <span>:</span></label>ESTA BETTERU CO</li>
                                <li><label>Flavour <span>:</span></label>Super Saver Pack</li>
                                <li><label>Diet Type <span>:</span></label>Vegetarian</li>
                                <li><label>Weight <span>:</span></label>200 Grams</li>
                                <li><label>Speciality <span>:</span></label>Gluten Free, Sugar Free</li>
                                <li><label>Info <span>:</span></label>Egg Free, Allergen-Free</li>
                                <li><label>Items <span>:</span></label>1</li>
                            </ul>
                        </div>
                        <div class="cr-product-price">
                            {{-- <span class="new-price">$120.25</span>
                            <span class="old-price">$123.25</span> --}}
                            @php $product_price = get_product_price($product->id); @endphp

                            <span class="new-price">{{ site_settings()->currency }}{{ $product_price->new_price }}</span>
                            @if ($product_price->discount != '')
                                <span
                                    class="old-price">{{ site_settings()->currency }}{{ $product_price->old_price }}</span>
                                <span class="discount-price">{{ $product_price->discount }} off</span>
                            @endif

                        </div>
                        <div class="cr-size-weight">
                            <h5><span>Size</span>/<span>Weight</span> :</h5>
                            <div class="cr-kg">
                                <ul>
                                    <li class="active-color">50kg</li>
                                    <li>80kg</li>
                                    <li>120kg</li>
                                    <li>200kg</li>
                                </ul>
                            </div>
                        </div>
                        <div class="cr-add-card">
                            <div class="cr-qty-main">
                                <input type="text" placeholder="." value="1" minlength="1" maxlength="20"
                                    class="quantity">
                                <button type="button" class="plus">+</button>
                                <button type="button" class="minus">-</button>
                            </div>
                            <div class="cr-add-button">
                                <button type="button" class="cr-button cr-shopping-bag">Add to cart</button>
                            </div>
                            <div class="cr-card-icon">
                                <a href="javascript:void(0)" class="wishlist">
                                    <i class="ri-heart-line"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-12">
                    <div class="cr-paking-delivery">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                    aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="additional-tab" data-bs-toggle="tab"
                                    data-bs-target="#additional" type="button" role="tab" aria-controls="additional"
                                    aria-selected="false">Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                                    type="button" role="tab" aria-controls="review"
                                    aria-selected="false">Review</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                            sapiente odio, error dolore vero temporibus consequatur, nobis veniam odit
                                            dignissimos consectetur quae in perferendis
                                            doloribusdebitis corporis, eaque dicta, repellat amet, illum adipisci vel
                                            perferendis dolor! Quis vel consequuntur repellat distinctio rem. Corrupti
                                            ratione alias odio, error dolore temporibus consequatur, nobis veniam odit
                                            laborum dignissimos consectetur quae vero in perferendis provident quis.</p>
                                    </div>
                                    <h4 class="heading">Packaging & Delivery</h4>
                                    <div class="cr-description">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                            perferendis dolor! Quis vel consequuntur repellat distinctio rem. Corrupti
                                            ratione alias odio, error dolore temporibus consequatur, nobis veniam odit
                                            laborum dignissimos consectetur quae vero in perferendis provident quis.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                                <div class="cr-tab-content">
                                    <div class="cr-description">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Error in vero
                                            sapiente
                                            doloribus debitis corporis, eaque dicta, repellat amet, illum adipisci vel
                                            perferendis dolor! Quis vel consequuntur repellat distinctio rem. Corrupti
                                            ratione alias odio, error dolore temporibus consequatur, nobis veniam odit
                                            laborum dignissimos consectetur quae vero in perferendis provident quis.</p>
                                    </div>
                                    <div class="list">
                                        <ul>
                                            <li><label>Brand <span>:</span></label>ESTA BETTERU CO</li>
                                            <li><label>Flavour <span>:</span></label>Super Saver Pack</li>
                                            <li><label>Diet Type <span>:</span></label>Vegetarian</li>
                                            <li><label>Weight <span>:</span></label>200 Grams</li>
                                            <li><label>Speciality <span>:</span></label>Gluten Free, Sugar Free</li>
                                            <li><label>Info <span>:</span></label>Egg Free, Allergen-Free</li>
                                            <li><label>Items <span>:</span></label>1</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <div class="cr-tab-content-from">
                                    <div class="post">
                                        @if ($reviews->isNotEmpty())
                                            <div class="content">
                                                @foreach ($reviews as $review)
                                                    <img src="{{ asset('public/asset/img/review/1.jpg') }}"
                                                        alt="review">
                                                    <div class="details">
                                                        <span
                                                            class="date">{{ $review->created_at->format('M d, Y') }}</span>
                                                        <span class="name">{{ $review->name }}</span>
                                                    </div>
                                                    <div class="cr-t-review-rating">
                                                        {{ $review->rating }}
                                                        <i class="ri-star-s-fill"></i>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <p>{{ $review->desc }}</p>
                                        @endif
                                        @if ($product->video_link != '')
                                            <div class="col-md-6">
                                                <div class="section-heading">
                                                    <h4 class="title">Video</h4>
                                                </div>

                                            </div>
                                        @endif
                                    </div>

                                    <h4 class="heading">Add a Review</h4>
                                    <form action="javascript:void(0)">
                                        <div class="cr-ratting-star">
                                            <span>Your rating :</span>
                                            <div class="cr-t-review-rating">
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-fill"></i>
                                                <i class="ri-star-s-line"></i>
                                                <i class="ri-star-s-line"></i>
                                                <i class="ri-star-s-line"></i>
                                            </div>
                                        </div>
                                        <div class="cr-ratting-input">
                                            <input name="your-name" placeholder="Name" type="text">
                                        </div>
                                        <div class="cr-ratting-input">
                                            <input name="your-email" placeholder="Email*" type="email" required="">
                                        </div>
                                        <div class="cr-ratting-input form-submit">
                                            <textarea name="your-commemt" placeholder="Enter Your Comment"></textarea>
                                            <button class="cr-button" type="submit" value="Submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="site-content">
        <div class="message"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="content-box single-product">
                        <div class="flexslider">
                            <ul class="slides">
                                <!-- <input type="hidden" name="id[]" id="product-id" value="{{ $product->id }}"> -->

                            </ul>
                        </div>
                        <span class="add-favourite addwishlist" data-id="{{ $product->id }}"><i
                                class="fas fa-heart"></i>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- <form action="{{ url('/checkout') }}"> -->
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                    <div class="product-info">
                        <span class="brand-name"></span>
                        <p class="product-name"></p>


                        <div class="product-color">
                            @php
                                $p_colors = array_filter(explode(',', $product->colors));
                                $i = 0;
                            @endphp
                            @if (!empty($p_colors))
                                <label>Color:</label>
                                <ul class="option-list">
                                    @foreach ($colors as $item1)
                                        @if (in_array($item1->id, $p_colors))
                                            @php $color_check = ($i==0) ? 'checked' : '';  @endphp
                                            <li class="radio-button">
                                                <input type="radio" name="product_color" {{ $color_check }}
                                                    id="color{{ $item1->id }}" required value="{{ $item1->id }}"
                                                    data-id="{{ $product->id }}">
                                                <label for="color{{ $item1->id }}"
                                                    style="background-color:{{ $item1->color_code }}"></label>
                                            </li>
                                            @php $i++;  @endphp
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        @foreach ($attributes as $row)
                            @php
                                $value = array_filter(explode(',', $row->attrvalues));
                            @endphp
                            <div class="product-attributes">
                                <span>{{ $row->title }}:</span>
                                @php $j=0;  @endphp
                                @foreach ($attrvalues as $item1)
                                    @if (in_array($item1->id, $value))
                                        @php $attr_check = ($j==0) ? 'checked' : '';  @endphp
                                        <input type="hidden" name="product_attrvalues" value="{{ $item1->id }}"
                                            data-id="{{ $row->product_id }}">
                                        <input type="radio" class="attrvalue" data-attr="{{ $item1->attribute }}"
                                            id="attrvalue{{ $item1->id }}" name="{{ strtolower($row->title) }}"
                                            {{ $attr_check }} value="{{ $item1->id }}" required>
                                        <label for="attrvalue{{ $item1->id }}">{{ $item1->value }}</label>
                                        @php $j++;  @endphp
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                        <!-- if($product->shipping_charges == 'free')
                                                        <div class="product-shipping">
                                                            <span><b>Shipping Charges: </b></span>
                                                            <p class="badge badge-success">Free</p>
                                                            <input type="hidden" name="shipping" value="0" data-id="{{ $product->id }}">
                                                        </div>
                                                    else -->
                        <div class="product-shipping">
                            <span class="shipping-head">Delivery: </span>
                            <select class="form-control shipping" name="shipping" id="" required>
                                <option value="" selected disabled>Select Location</option>
                                @foreach ($cities as $city)
                                    @php $selected = ''; @endphp
                                    @if (session()->get('user_city') == $city->id)
                                        @php $selected = 'selected'; @endphp
                                    @endif
                                    <option value="{{ $city->id }}" data-p-ship="{{ $product->shipping_charges }}"
                                        {{ $selected }} data-shipping="{{ $city->cost_city }}">
                                        {{ $city->city_name }} ({{ $city->state_name }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="shipping-charges"></div>
                        <!-- endif -->
                        <div class="product-btn">
                            <?php if(session()->has('user_name')){ ?>
                            @if (in_array($product->id, $cart))
                                <a href="{{ url('/cart') }}" class="btn btn-primary">Go to cart</a>
                            @else
                                <button type="button" class="btn btn-primary mr-2" id="addcart"
                                    data-user="{{ session()->get('user_id') }}" data-id="{{ $product->id }}">Add to
                                    cart</button>
                            @endif
                            <a href="#" class="btn btn-danger" id="checkout">Buy Now</a>
                            <!-- <button type="submit" class="btn btn-danger">Buy Now</button> -->
                            <?php }else{ ?>
                            <button type="button" class="btn btn-primary mr-2" id="addcart" data-user=''
                                data-id="{{ $product->id }}">Add to cart</button>
                            <a href="{{ url('/user_login') }}" class="btn btn-danger">Buy Now</a>
                            <?php } ?>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!------ RELATED PRODUCTS ------>
    @if ($related->isNotEmpty($related))
        <div class="product-box">
            <div class="container">
                <div class="section-heading">
                    <h3 class="title">Related Products</h3>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-lg-4 col-md-6 col-6 cr-product-box mb-24 aos-init aos-animate"
                        data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                            @foreach ($related as $item)
                                @include('public.product-grid', $item)

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!------/RELATED PRODUCTS------>
@stop

@section('pageJsScripts')

    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '#checkout', function() {
                var attr = {};
                var p_id = $('input[name=product_id]').val();

                if ($('input[name=product_color]').length > 0) {
                    var color_id = $('input[name="product_color"]:checked').val();
                    if (color_id == '') {
                        alert('Select Color');
                    }
                }
                if ($('.product-attributes').length > 0) {
                    var attr_val = '';
                    $('.product-attributes').each(function() {
                        var key = $(this).children('input[class=attrvalue]:checked').attr(
                            'data-attr');
                        var val = $(this).children('input[class=attrvalue]:checked').val();
                        attr_val += key + ':' + val + ',';
                    });
                    attr[p_id] = attr_val;
                }

                var base_url = $('.demo').val();
                var location = $('.shipping option:selected').val();
                if (location == '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Select Location',
                        showConfirmButton: false,
                        timer: 1000
                    });
                } else {
                    var url = base_url + "/checkout?product_id=" + p_id + "&product_color=" + color_id +
                        "&product_attr=" + encodeURIComponent(JSON.stringify(attr)) + "&location=" +
                        location + "&qty=1";
                    window.location.href = url;
                }

            });

            var owl = $('.related-carousel');
            owl.owlCarousel({
                margin: 30,
                loop: false,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    450: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    },
                }
            });


        });

        function increment() {
            document.getElementById('demoInput').stepUp();
        }

        function decrement() {
            document.getElementById('demoInput').stepDown();
        }

        function show_shipping_charges() {
            var shipping_charges = $('.shipping').children('option:selected').data('shipping');
            var product_shipping = $('.shipping').children('option:selected').data('p-ship');
            if (product_shipping != 'free') {
                if (shipping_charges != undefined && shipping_charges > -1) {
                    var row = '<p><span><b>Shipping Charges :</b> {{ site_settings()->currency }}' + shipping_charges +
                        '</span></p>';
                }
            } else {
                var row = '<p><span><b>Shipping Charges :</b> Free</span></p>';
            }
            $('.shipping-charges').html(row);
        }
        show_shipping_charges();

        $(document).on('change', '.shipping', function() {
            show_shipping_charges();
        });
    </script>
@stop
