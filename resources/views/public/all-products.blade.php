@extends('public.layout')
@section('title', 'Search')
@section('content')
<main class="main">
    <div class="page-header mt-30 mb-50">
        
    </div>
    <div class="container mb-30">
        <div class="row flex-row-reverse">
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    @if(!empty($products))
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{ count($products) }}</strong> items for you!</p>
                    </div>
                    @endif
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            
                        </div>
                        <div class="sort-by-cover">
                            
                        </div>
                    </div>
                </div>
                @if(!empty($products) && $products->isNotEmpty())
                    
                    <div class="row product-grid">
                        @foreach($products as $item)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{url('/product/'.$item->slug)}}">
                                            <img class="default-img" src="{{asset('public/products/'.$item->thumbnail_img)}}" alt="" height="100px" width="100px" />
                                            
                                        </a>
                                    </div>
                                    
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href='javascript:void(0)'>{{$item->brand_name}}</a>
                                    </div>
                                    <h2><a href="{{url('/product/'.$item->slug)}}">{{substr($item->product_name,0,25).'...'}}</a></h2>
                                    
                                    <div class="product-card-bottom">
                                        @php $product_price = get_product_price($item->id); @endphp
                                        <div class="product-price">
                                            
                                            <span>{{site_settings()->currency}}{{$product_price->new_price}}</span>
                                            @if($product_price->discount != '')
                                            <span class="old-price">{{site_settings()->currency}}{{$product_price->old_price}}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="add-cart">
                                            <a class='add product-add-to-cart' href='javascript:void(0)' data-id="{{ $item->id }}" data-user="{{session()->get('user_id')}}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--end product card-->
                    </div>
                    
                @else
                    <div class="row product-grid">
                        <div class="content-box text-center">
                            <p class="m-0">No Products Found</p>
                        </div>    
                    </div>
                @endif
                
                <!--product grid-->
                <!-- <div class="pagination-area mt-20 mb-20">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                            </li>
                            @if(!empty($products))
                            <li class="page-item">
                                {{$products->appends(request()->query())->links()}}
                            </li>
                            @endif
                        </ul>
                    </nav>
                </div> -->
                
                <!--End Deals-->
            </div>
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="">Category</h5>
                    <ul>
                        @foreach(all_category() as $cat_menu)
                        @if($cat_menu->parent_category == '0')
                        <li>
                            <a href="{{url('products/'.$cat_menu->category_slug)}}">{{$cat_menu->category_name}}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <!-- Fillter By Price -->
                <div class="sidebar-widget price_range range mb-30">
                    <h5 class="section-title style-1 mb-30">Fill by price</h5>
                    <div class="price-filter">
                        <div class="price-filter-inner">
                            <div id="slider-range" class="mb-20"></div>
                            <div class="d-flex justify-content-between">
                                <div class="caption">From: <strong id="slider-range-value1" class="text-brand"></strong></div>
                                <div class="caption">To: <strong id="slider-range-value2" class="text-brand"></strong></div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group">
                        <div class="list-group-item mb-10 mt-10">
                            <label class="fw-900">Color</label>
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                <label class="form-check-label" for="exampleCheckbox1"><span>Red (56)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="" />
                                <label class="form-check-label" for="exampleCheckbox2"><span>Green (78)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox3" value="" />
                                <label class="form-check-label" for="exampleCheckbox3"><span>Blue (54)</span></label>
                            </div>
                            <label class="fw-900 mt-15">Item Condition</label>
                            <div class="custome-checkbox">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                <label class="form-check-label" for="exampleCheckbox11"><span>New (1506)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox21" value="" />
                                <label class="form-check-label" for="exampleCheckbox21"><span>Refurbished (27)</span></label>
                                <br />
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox31" value="" />
                                <label class="form-check-label" for="exampleCheckbox31"><span>Used (45)</span></label>
                            </div>
                        </div>
                    </div>
                    <a class='btn btn-sm btn-default' href='shop-grid-right.html'><i class="fi-rs-filter mr-5"></i> Fillter</a>
                </div>
                <!-- Product sidebar Widget -->
                
                
            </div>
        </div>
    </div>
</main>

@stop
