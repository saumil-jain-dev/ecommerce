<!------ FOOTER-WIDGET ------>
<footer class="footer padding-t-100 bg-off-white">
    <div class="container">
        <div class="row footer-top padding-b-100">
            <div class="col-xl-4 col-lg-6 col-sm-12 col-12 cr-footer-border">
                <div class="cr-footer-logo">
                    <div class="image">
                        <a href="{{ url('/') }}">
                            <h6>{{ site_settings()->site_name }}</h6>
                        </a>
                    </div>
                    <p>{{ site_settings()->description }}</p>
                </div>
                @if (site_settings()->address != '' || site_settings()->phone != '' || site_settings()->email != '')
                <div class="cr-footer">
                    <h4 class="cr-sub-title cr-title-hidden">
                        Contact us
                        <span class="cr-heading-res"></span>
                        <div class="cr-heading-res"><i class="ri-arrow-down-s-line" aria-hidden="true"></i></div>
                    </h4>
                    <ul class="cr-footer-links cr-footer-dropdown active-drop-footer">
                        @if (site_settings()->address != '')
                        <li class="location-icon">
                            {{ site_settings()->address }}
                        </li>
                        @endif
                        @if (site_settings()->email != '')
                        <li class="mail-icon">
                            <a href="javascript:void(0)">{{ site_settings()->email }}</a>
                        </li>
                        @endif
                        @if (site_settings()->phone != '')
                        <li class="phone-icon">
                            <a href="javascript:void(0)"> {{ site_settings()->phone }}</a>
                        </li>
                        @endif

                    </ul>
                </div>
                @endif
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-12 col-12 cr-footer-border">
                <div class="cr-footer">
                    <h4 class="cr-sub-title">
                        Categories
                        <span class="cr-heading-res"></span>
                        <div class="cr-heading-res"><i class="ri-arrow-down-s-line" aria-hidden="true"></i></div>
                    </h4>
                    <ul class="cr-footer-links cr-footer-dropdown active-drop-footer">
                        @foreach (all_category() as $f_cat)
                            @if ($f_cat->parent_category == '0')
                                <li><a href="{{ url('c/' . $f_cat->category_slug) }}"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i> {{ $f_cat->category_name }}</a></li>
                            @endif
                        @endforeach
                    </ul>

                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-12 col-12 cr-footer-border">
                <div class="cr-footer">
                    <h4 class="cr-sub-title">
                        Category
                        <span class="cr-heading-res"></span>
                        <div class="cr-heading-res"><i class="ri-arrow-down-s-line" aria-hidden="true"></i></div>
                    </h4>
                    <ul class="cr-footer-links cr-footer-dropdown active-drop-footer">
                        @foreach (site_pages() as $pages)
                            <li><a href="{{ $pages->page_slug }}"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                    {{ $pages->page_title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        <div class="cr-last-footer">
            <p>© <span id="copyright_year">{{ site_settings()->copyright }}</span>, All rights reserved.</p>
        </div>
    </div>
</footer>

<!------/FOOTER-WIDGET------>

<!------ FOOTER ------>

<!------/FOOTER------>

<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('public/assets/js/price-range.js')}}"></script>
<script src="{{asset('public/assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.validate.min.js')}}"></script>
<!--  -->
<script src="{{asset('public/assets/js/action.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://unpkg.com/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<?php if(!(session()->has('user_name'))){ ?>
<!-- <script src="{{ asset('public/assets/js/addcart.js') }}"></script> -->

<?php } ?>
<!-- Vendor Custom -->
<script src="{{ asset('public/asset/js/vendor/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('public/asset/js/vendor/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('public/asset/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/asset/js/vendor/mixitup.min.js') }}"></script>
<script src="{{ asset('public/asset/js/vendor/range-slider.js') }}"></script>
<script src="{{ asset('public/asset/js/vendor/aos.min.js') }}"></script>
<script src="{{ asset('public/asset/js/vendor/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('public/asset/js/vendor/slick.min.js') }}"></script>
<script src="{{ asset('public/assets/js/sweetalert2.min.js') }}"></script>

<!-- Main Custom -->

<script src="{{ asset('public/asset/js/main.js') }}"></script>
<script src="{{ asset('public/assets/js/main_ajax.js') }}"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script type="text/javascript">
    // $(document).ready(function() {

    //     $('.flexslider').flexslider({
    //         animation: "slide",
    //         controlNav: "thumbnails",
    //         start: function(slider) {
    //             $('body').removeClass('loading');
    //         }
    //     });

    //     $('.navbar-light .dmenu').hover(function() {
    //         $(this).find('.sm-menu').first().stop(true, true).slideDown(300);
    //     }, function() {
    //         $(this).find('.sm-menu').first().stop(true, true).slideUp(300)
    //     });

    //     $('.select2').select2();

    // });
</script>
@yield('pageJsScripts')
</body>

</html>
