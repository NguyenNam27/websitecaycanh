<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\SliderController;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\IntroduceController;

use App\Http\Controllers\CustomerController;




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
//Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/gioi-thieu', [HomeController::class, 'introduce']);
Route::get('/san-pham', [HomeController::class, 'product']);
Route::get('/tin-tuc', [HomeController::class, 'blog']);
Route::get('/lien-he', [HomeController::class, 'contact']);

//Route::get('/404','HomeController@error_page');

Route::post('/tim-kiem', [HomeController::class, 'search']);



//Danh muc san pham trang chu
Route::get('/danh-muc/{slug_category_product}', [CategoryProduct::class, 'show_category_home']);

Route::get('/chi-tiet/{product_slug}', [ProductController::class, 'details_product']);

//Backend
Route::get('/admin', [AdminController::class, 'index']);

Route::get('/dashboard', [AdminController::class, 'show_dashboard']);

Route::get('/logout', [AdminController::class, 'logout']);

Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);



//Category Product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);

// Khách hàng
Route::get('/all-customer', [CustomerController::class, 'all_customer']);
Route::get('/delete-customer/{customer_id}', [CustomerController::class, 'delete_customer']);


Route::post('/export-csv','CategoryProduct@export_csv');
Route::post('/import-csv','CategoryProduct@import_csv');

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);

Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_id}', [CategoryProduct::class, 'update_category_product']);
//Send Mail
Route::get('/send-mail', [HomeController::class, 'send_mail']);

//Login facebook
Route::get('/login-facebook', [AdminController::class, 'login_facebook']);
Route::get('/admin/callback', [AdminController::class, 'callback_facebook']);

//Login google
Route::get('/login-google', [AdminController::class, 'login_google']);
Route::get('/google/callback', [AdminController::class, 'callback_google']);

//Brand Product
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);
Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);

Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);
Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);


//Product
// Route::group(['middleware' => 'roles', 'roles'=>['admin','author']], function () {
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);

// });
//Route::get('users',

Route::get('users',
    [UserController::class, 'index'],
    ['middleware'=> 'roles'],
    ['as'=>'Users']
);
Route::get('add-users', [UserController::class, 'add_users']);
Route::post('store-users', [UserController::class, 'store_users']);
Route::post('assign-roles', [UserController::class, 'assign_roles']);


Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);

//Coupon
Route::post('/check-coupon', [CartController::class, 'check_coupon']);
Route::get('/unset-coupon', [CouponController::class, 'unset_coupon']);
Route::get('/insert-coupon', [CouponController::class, 'insert_coupon']);

Route::get('/delete-coupon/{coupon_id}', [CouponController::class, 'delete_coupon']);
Route::get('/list-coupon', [CouponController::class, 'list_coupon']);
Route::post('/insert-coupon-code', [CouponController::class, 'insert_coupon_code']);


//Cart
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/gio-hang', [CartController::class, 'gio_hang']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::get('/del-product/{session_id}', [CartController::class, 'delete_product']);
Route::get('/del-all-product', [CartController::class, 'delete_all_product']);

//Checkout
Route::get('/dang-ky', [CheckoutController::class, 'register_checkout']);

Route::get('/dang-nhap', [CheckoutController::class, 'login_checkout']);
Route::get('/del-fee', [CheckoutController::class, 'del_fee']);

Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);

Route::post('/order-place', [CheckoutController::class, 'order_place']);

Route::post('/login-customer', [CheckoutController::class, 'login_customer']);

Route::get('/checkout', [CheckoutController::class, 'checkout']);

Route::get('/payment', [CheckoutController::class, 'payment']);

Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);

Route::post('/calculate-fee', [CheckoutController::class, 'calculate_fee']);

Route::post('/select-delivery-home', [CheckoutController::class, 'select_delivery_home']);
Route::post('/confirm-order', [CheckoutController::class, 'confirm_order']);

//Order
Route::get('/delete-order/{order_code}', [OrderController::class, 'order_code']);
Route::get('/print-order/{checkout_code}', [OrderController::class, 'print_order']);
Route::get('/manage-order', [OrderController::class, 'manage_order']);
Route::get('/view-order/{order_code}', [OrderController::class, 'view_order']);
Route::post('/update-order-qty', [OrderController::class, 'update_order_qty']);
Route::post('/update-qty', [OrderController::class, 'update_qty']);


//Delivery
Route::get('/delivery', [DeliveryController::class, 'delivery']);
Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
Route::post('/select-feeship', [DeliveryController::class, 'select_feeship']);
Route::post('/update-delivery', [DeliveryController::class, 'update_delivery']);

//Banner
Route::get('/manage-slider', [SliderController::class, 'manage_slider']);
Route::get('/add-slider', [SliderController::class, 'add_slider']);
Route::get('/delete-slide/{slide_id}', [SliderController::class, 'delete_slide']);
Route::post('/insert-slider', [SliderController::class, 'insert_slider']);
Route::get('/unactive-slide/{slide_id}', [SliderController::class, 'unactive_slide']);
Route::get('/active-slide/{slide_id}', [SliderController::class, 'active_slide']);


//tin tức
Route::get('/all-post', [BlogController::class, 'all_post'])->name('allpost');
Route::get('/details_post/{slug}', [HomeController::class, 'post_detail']);


Route::get('/unactive-post/{id}', [BlogController::class, 'unactive_post']);
Route::get('/active-post/{id}', [BlogController::class, 'active_post']);
Route::get('/add-post', [BlogController::class, 'add_post'])->name('addpost');
Route::get('/edit-post/{id}', [BlogController::class, 'edit_post'])->name('editpost');
Route::post('/save-post', [BlogController::class, 'save_post'])->name('savepost');
Route::post('/update-post/{id}', [BlogController::class, 'update_post'])->name('updatepost');
Route::get('/delete-post/{id}', [BlogController::class, 'delete_post'])->name('delete_post');

//bai gioi thieu
Route::get('/all-introduce', [IntroduceController::class, 'all_introduce']);
Route::get('/add-introduce', [IntroduceController::class, 'add_introduce']);
Route::get('/active-introduce/{id}', [IntroduceController::class, 'active_introduce']);
Route::get('/unactive-introduce/{id}', [IntroduceController::class, 'unactive_introduce']);

Route::post('/save-introduce', [IntroduceController::class, 'save_introduce'])->name('savepost');
Route::get('/edit-introduce/{id}', [IntroduceController::class, 'edit_introduce']);

Route::post('/update-introduce/{id}', [IntroduceController::class, 'update_introduce']);

Route::get('/delete-introduce/{id}', [IntroduceController::class, 'delete_introduce']);




