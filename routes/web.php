<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\FlashdealController;
use App\Http\Controllers\AttrvaluesController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PaymentmethodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::post('/admin',[AdminController::class,'index']);
    Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name('auth.google');

    Route::any('google/callback', [UserController::class, 'handleGoogleCallback'])->name('google.callback');

    Route::group(['middleware'=>['protectedPage']], function(){
        Route::get('admin',[AdminController::class,'index']);
        Route::get('admin/dashboard',[AdminController::class,'dashboard']);
        Route::get('admin/logout',[AdminController::class,'logout']);
        Route::any('admin/general-settings',[SettingsController::class,'general_settings']);
        Route::any('admin/profile-settings',[SettingsController::class,'profile_settings']);
        Route::post('admin/profile-settings/change-password',[SettingsController::class,'change_password']);
        Route::any('admin/social-settings',[SettingsController::class,'social_settings']);
        Route::resource('admin/banner',BannerController::class);
        Route::resource('admin/brand',BrandController::class);
        Route::resource('admin/category',CategoryController::class);
        Route::resource('admin/sub-category',SubcategoryController::class);
        Route::resource('admin/products',ProductController::class);
        Route::post('admin/get-attrvalue',[ProductController::class,'get_attrvalue']);
        Route::resource('admin/tax',TaxController::class);
        Route::resource('admin/discount',DiscountController::class);
        Route::post('admin/discount/discount_code_checker',[DiscountController::class,'discount_code_checker']);
        Route::post('admin/discount/{id}/discount_code_checker',[DiscountController::class,'discount_code_checker']);
        Route::resource('admin/colors',ColorController::class);
        Route::resource('admin/attribute',AttributeController::class);
        Route::resource('admin/attribute-values',AttrvaluesController::class);
        Route::resource('admin/countries',CountryController::class);
        Route::resource('admin/states',StateController::class);
        Route::resource('admin/cities',CityController::class);
        Route::resource('admin/pages',PagesController::class);
        Route::resource('admin/blogs',BlogController::class);
        Route::resource('admin/orders',OrderController::class);
        Route::get('admin/orders/{id}/view_order',[OrderController::class,'view_order']);
        Route::post('admin/order-product/delivered',[OrderController::class,'changeDelivery']);
        Route::post('admin/order-status',[OrderController::class,'changeStatus'])->name('order.changeStatus');
        Route::resource('admin/users',UserController::class);
        Route::post('admin/users/block',[UserController::class,'changeStatus']);
        Route::post('admin/page_showIn_header',[PagesController::class,'show_in_header']);
        Route::post('admin/page_showIn_footer',[PagesController::class,'show_in_footer']);
        Route::get('admin/product-sale',[ReportController::class,'product_sale']);
        Route::get('admin/product-stock',[ReportController::class,'product_stock']);
        Route::resource('admin/payment-method',PaymentmethodController::class);
        Route::post('admin/payment-method/status',[PaymentmethodController::class,'changeStatus']);
        Route::resource('admin/flash-deals',FlashdealController::class);
        Route::post('admin/get-flash',[FlashdealController::class,'get_flash']);
        Route::post('admin/get-flash-edit',[FlashdealController::class,'get_flash_edit']);
        Route::get('admin/reviews/{id}/edit',[ReviewController::class,'edit']);
        Route::put('admin/reviews/{id}',[ReviewController::class,'update']);
        Route::post('admin/view_review',[ReviewController::class,'show']);
        Route::post('admin/approve_review',[ReviewController::class,'approveReview']);
        Route::post('admin/delete_review',[ReviewController::class,'destroy']);
        Route::any('admin/reviews',[ReviewController::class,'index']);
    });


    Route::get('/',[homeController::class,'index'])->name('home');
    Route::get('/products/{text}',[homeController::class,'search_products']);
    Route::get('/product/{text}',[homeController::class,'productpage']);
    Route::get('/flash-deals',[homeController::class,'allflashdeals']);
    Route::get('/flash-products',[homeController::class,'allflashproducts']);
    Route::get('/flash-products/{text}',[homeController::class,'flashproducts']);
    Route::get('/today-deals',[homeController::class,'todayDeals']);
    Route::get('/signup',[UserController::class,'create'])->name('signup');
    Route::post('/signup',[UserController::class,'store']);
    Route::get('/user_login',[UserController::class,'login'])->name('user_login');
    Route::post('/user_login',[UserController::class,'login_form']);
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
    Route::post('/my-profile/get-state',[UserController::class,'get_state']);
    Route::post('/my-profile/get-city',[UserController::class,'get_city']);
    Route::get('/changepassword',[UserController::class,'changepassword']);
    Route::post('/changepassword',[UserController::class,'change_password']);

    Route::get('/my-profile',[UserController::class,'my_profile']);
    Route::post('/my-profile',[UserController::class,'update']);

    Route::post('/add-wishlist',[UserController::class,'add_wishlist']);
    Route::post('/remove-wishlist',[UserController::class,'remove_wishlist']);
    Route::get('/wishlists',[UserController::class,'my_wishlist'])->name('wishlists');

    Route::get('/cart',[UserController::class,'my_cart'])->name('cart');
    Route::post('/show_cart',[UserController::class,'show_local_cart']);
    Route::post('/save_cart',[UserController::class,'save_cart']);
    Route::post('/remove_cart',[UserController::class,'remove_cart']);

    Route::post('/change_address',[UserController::class,'change_address']);
    Route::get('/checkout',[UserController::class,'checkout']);
    Route::post('/checkout',[UserController::class,'order_products']);
    Route::post('/order/complete',[UserController::class,'complete_order']);

    Route::get('/success',[PaymentController::class,'success']);
    Route::get('pay-with-paypal/{id}',[PaymentController::class,'payWithpaypal']);
    Route::get('/paypal/status',[PaymentController::class,'getPaymentStatus'])->name('paypal-status');
    Route::get('/pay-with-razorpay/{id}/{text}',[PaymentController::class,'yb_payWithRazorpay']);

    Route::get('my-account',[UserController::class,'my_account'])->name('my_account');
    Route::post('track-order',[UserController::class,'track_order'])->name('track_order');
    Route::post('/my-account/order-view/{id}',[UserController::class,''])->name('my_account.order-view');

    Route::get('/my_orders', [UserController::class, 'my_orders']);
    Route::get('/show_order_product/{id}', [UserController::class, 'show_order_products'])->name('my_account.order-view');

    Route::post('get-suggestions',[homeController::class,'get_suggestions']);
    Route::get('/all-products',[homeController::class,'search_products']);
    Route::get('search',[homeController::class,'search_products']);

    Route::get('review/create/{id}',[ReviewController::class,'create']);
    Route::post('review/store',[ReviewController::class,'store']);
    Route::get('my-reviews',[UserController::class,'my_reviews']);

    Route::get('forgot-password', [UserController::class, 'forgotPassword_show']);
    Route::post('forgot-password', [UserController::class, 'forgotPassword_submit']);
    Route::get('reset-password', [UserController::class, 'resetPassword_show']);
    Route::post('reset-password', [UserController::class, 'submitResetPasswordForm']);
    Route::get('{page}', [HomeController::class, 'site_pages']);

