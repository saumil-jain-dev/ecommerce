 <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-mg-3 col-md-3 col-sm-12 align-self-center">
                    <div class="logo">

                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-12">
                    <div class="searchbox position-relative">
                        <form action="{{ url('search') }}" method="GET" class="search-form rounded-0 d-flex">
                            @php $search = '';  @endphp
                            @if (request()->get('keyword'))
                                @php $search = request()->get('keyword');  @endphp
                            @endif
                            <input type="text" class="form-control rounded-0" id="search" name="keyword"
                                placeholder="Search Product Here..." value="{{ $search }}">
                            <button type="submit" class="btn btn-primary rounded-0">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                        <div class="search-content position-absolute"></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12">
                    <ul class="header-links ml-auto mr-0 text-center text-md-right">
                        @if (Session::has('user_name'))
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" id="dropdownMenuButton"
                                    data-toggle="dropdown"><i class="fa fa-user"></i> Hello,
                                    {{ ucfirst(substr(session()->get('user_name'), 0, 10) . '...') }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('/my-profile') }}">My Profile</a>
                                    <a class="dropdown-item" href="{{ url('/cart') }}">My Cart</a>
                                    <a class="dropdown-item" href="{{ url('/my_orders') }}">My Orders</a>
                                    <a class="dropdown-item" href="{{ url('/my-reviews') }}">My Reviews</a>
                                    <a class="dropdown-item" href="{{ url('/changepassword') }}">Change Password</a>
                                    <a class="dropdown-item logout user-logout" href="javascript:void(0)">Log Out</a>
                                </div>
                            </li>
                        @else
                            <li><a href="{{ url('/user_login') }}"><i class="fa fa-user"></i> Login</a></li>
                            <li><a href="{{ url('/signup') }}"><i class="fa fa-user-plus"></i> Signup</a></li>
                        @endif
                        <li><a href="{{ url('/wishlists') }}"><i class="far fa-heart"></i> Wishlist</a><span
                                class="wishlist-count">{{ user_wishlist() }}</span></li>
                        <li><a href="{{ url('/cart') }}"><i class="fas fa-shopping-cart"></i> Cart</a><span
                                class="cartlist">{{ user_cart() }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg shadow-sm header-menu p-0">
        <!-- <a href="#" class="navbar-brand font-weight-bold d-block d-lg-none">MegaMenu</a> -->
        <button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbars"
            aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarContent" class="collapse navbar-collapse">
            <ul class="navbar-nav mx-auto">
                @foreach (all_category() as $cat_menu)
                    @if ($cat_menu->parent_category == '0')
                        <li class="nav-item dropdown megamenu"><a id="megamneu" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="nav-link dropdown-toggle font-weight-bold text-uppercase">{{ $cat_menu->category_name }}</a>
                            <div aria-labelledby="megamenu" class="dropdown-menu border-0 m-0">
                                <!-- <div class="container bg-white pt-4 pb-1 px-3 w-auto"> -->
                                <div class="card-columns">
                                    @foreach (all_category() as $sub_cat)
                                        @if ($sub_cat->level == '1' && $sub_cat->parent_category == $cat_menu->id)
                                            <div class="sub-list pl-0 pl-md-3">
                                                <h6><a
                                                        href="{{ url('c/' . $sub_cat->category_slug) }}">{{ $sub_cat->category_name }}</a>
                                                </h6>
                                                <ul class="list-unstyled">
                                                    @foreach (all_category() as $types)
                                                        @if ($types->level == '2' && $types->parent_category == $sub_cat->id)
                                                            <li class="nav-item"><a
                                                                    href="{{ url('c/' . $types->category_slug) }}"
                                                                    class="nav-link text-small pb-0">{{ $types->category_name }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <!-- </div> -->
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </nav>
