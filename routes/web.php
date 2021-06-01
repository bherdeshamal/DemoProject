<?php

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

Route::get('/', function () 
{
    return view('auth.login');
});

Route::get('/home', function () {
return view('dashboard.admin');
});

Route::get('/home','IndexController@viewCharts');

Route::get('/index', function () {
    return view('index');
});

Route::get('/index', 'IndexController@index');


Route::get('/dashboard', 'IndexController@dashboard');

Route::get('/indexcheckout', function () {
        return view('frontend.indexcheckout');
});

    Route::match(['get','post'],'/indexcheckout', 'FrontenduserloginController@checkout');

    //Route::post('/indexcheckout', 'FrontenduserloginController@checkout');


    Route::get('/orderreview', 'FrontenduserloginController@orderreviewpage');

    Route::post('/place_order', 'FrontenduserloginController@placeorder');

    Route::get('/orders','FrontenduserloginController@userOrders');


    Route::get('/user_order_details/{id}','FrontenduserloginController@userOrderDetails');

    Route::get('/Thanks', 'FrontenduserloginController@thanks');

    Route::get('/paypal', 'FrontenduserloginController@paypal');

    Route::get('/vieworders','FrontenduserloginController@vieworders');

    Route::get('/orderreview/delete-orderproduct/{id}','FrontenduserloginController@deleteorderitem');

    Route::get('/paypal_thanks','FrontenduserloginController@thankspaypal');


    Route::get('/paypal_cancel','FrontenduserloginController@cancelpaypal');



Route::get('/usermanage', function () {
    return view('usermanage.usermanage');
});

    Route::get('/usermanage/usermanage','usermsController@createp');
    Route::post('/useraction','usermsController@storeDevice');
    Route::get('/userview','usermsController@indexc');
    Route::get('/click_edituser/{id}','usermsController@edituser');
    Route::post('/updateuser/{id}','usermsController@updateuser')->name('updateuser');
    Route::get('click_deleteuser/{id}','usermsController@deleteuser');
    
    Route::get('/view-users-charts','usermsController@viewUsersCharts');

Route::get('/configure', function () {
    return view('configurations.configure');
});

    Route::get('/configurations/configure','ConfigurationController@createconfiguration');
    Route::post('/configureaction','ConfigurationController@storeconfiguration');
    Route::get('/configureview','ConfigurationController@indexconfiguration');
    Route::get('/click_editconfiguration/{id}','ConfigurationController@editconfiguration');
    Route::post('/updateconfiguration/{id}','ConfigurationController@updateconfiguration')->name('updateconfiguration');
    Route::get('click_deleteconfiguration/{id}','ConfigurationController@deleteconfiguration');

Route::get('/category', function () {
    return view('categories.category');
});

    Route::get('/category','CategoriesController@create');
    Route::post('/categoriesaction','CategoriesController@storeDevice');
    Route::get('/categoryview','CategoriesController@indexc');
    Route::get('/click_edit/{id}','CategoriesController@edit');
    Route::post('/update/{id}','CategoriesController@updatec')->name('updatec');
    Route::get('click_deletec/{id}','CategoriesController@delete');


Route::get('/product', function () {
    return view('products.product');
});

    Route::get('/product','ProductsController@createproduct');
    Route::post('/productsaction','ProductsController@storeDevice');
    Route::get('/productview','ProductsController@indexproduct');
    Route::get('/click_editproduct/{id}','ProductsController@editproduct');
    Route::post('/updateproduct/{id}','ProductsController@updateproduct')->name('updateproduct');
    Route::get('click_deleteproduct/{id}','ProductsController@deleteproduct');
    Route::get('/productdetail/{id}','ProductsController@productdetail');

    
    Route::get('/detail/{id}','ProductsController@detail');

    Route::post('/add-cart','ProductsController@addtocart');

    Route::get('/cart','ProductsController@cart');

    Route::get('/cart/delete-product/{id}','ProductsController@deletecartitem');

    Route::post('apply-coupon','ProductsController@applycoupon');

    Route::match(['get','post'],'/wishlist','ProductsController@wishlist');

    
    Route::get('/wishlist/delete-product/{id}','ProductsController@deletewishlistitem');


    Route::get('/cart/update-product/{id}/{quantity}','ProductsController@updatecartquantity');


Route::get('/banner', function () {
    return view('banners.banner');
});

    Route::get('/banners/banner','BannerController@createbanner');
    Route::post('/bannersaction','BannerController@storebanner');
    Route::get('/bannerview','BannerController@indexbanner');
    Route::get('/click_editbanner/{id}','BannerController@editbanner');
    Route::post('/updatebanner/{id}','BannerController@updatebanner')->name('updatebanner');
    Route::get('click_deletebanner/{id}','BannerController@deletebanner');


Route::get('/coupon', function () {
    return view('coupons.coupon');
});

    Route::get('/coupons/coupon','CouponController@createcoupon');
    Route::post('/couponaction','CouponController@storecoupon');
    Route::get('/couponview','CouponController@indexcoupon');
    Route::get('/click_editcoupon/{id}','CouponController@editcoupon');
    Route::post('/updatecoupon/{id}','CouponController@updatecoupon')->name('updatecoupon');
    Route::get('click_deletecoupon/{id}','CouponController@deletecoupon');


Route::get('/reports', function () {
    return view('dashboard.reports');
});

Route::get('/shoplogin', function () {
    return view('frontend.shoplogin');
});

    Route::post('/check', 'FrontenduserloginController@check');
    Route::post('/registeraction','FrontenduserloginController@storeDevice');
    Route::get('/frontuserview','FrontenduserloginController@viewusers');
    
    Route::get('/export-users','FrontenduserloginController@exportusers');
    
    Route::get('/export-coupons','FrontenduserloginController@exportcoupons');
    
    Route::get('/export-orders','FrontenduserloginController@exportorders');

Route::get('/logout','FrontenduserloginController@logout');
   
Route::get('/frontlogin', function () {
    return view('frontend.frontlogin');
});

  
Route::get('/account', function () {
    return view('frontend.account');
});

    Route::match(['get','post'],'/account','UserAddressController@account');

    Route::post('/check-user-pwd','UserAddressController@chkUserPassword');
    Route::post('/update-user-pwd','UserAddressController@updatePassword');


Route::get('/shop', function () 
{
    return view('frontend.shop');
});

    Route::get('/shop', 'IndexController@shop');

    Route::get('/productshop', 'IndexController@productshop');

    Route::get('/productdetailview', 'IndexController@productdetail');


    Route::get('/shopproductdetailview', 'IndexController@productdetailshopee');

Route::get('/contactus', function () {
    return view('frontend.contactus');
});

    Route::get('/contactus','sendemailcontroller@contactus');
    Route::post('/sendaction','sendemailcontroller@send');
    Route::get('/contactview','sendemailcontroller@display');
    
    Route::get('/revert-back/{id}','sendemailcontroller@revertBack');
    
    Route::post('/sendreplyback/{id}','sendemailcontroller@sendreply')->name('sendreplyback');


Route::get('/blog', function () {
    return view('frontend.blog');
});


Route::get('/infocart', function () {
    return view('frontend.infocart');
});


Route::get('/blog', 'IndexController@blog');

Route::get('/blog1', function () {
    return view('frontend.blog1');
});


Route::get('/404', function () {
    return view('frontend.404');
});

Route::get('/blogsingle', function () {
    return view('frontend.blogsingle');
});


Route::get('/blogsingle1', function () {
    return view('frontend.blogsingle1');
});

Route::get('/admin', function () {
    return redirect('/admin');
});


Route::get('/forget', function () {
    return view('frontend.forget');
});

Route::post('/forgotPassword', 'FrontenduserloginController@forgotPassword');

Route::get('/admincontactus', function () {
    return view('ad.admincontactus');
});
    Route::post('/sendadminaction','admincontactcontroller@sendadmin');
    Route::get('/contactview','admincontactcontroller@display');


Route::get('/add_cms_page', function () {
    return view('cms.add_cms_page');
});
    
    Route::get('/cms/add_cms_page','CmsPageController@addcmspage');
    Route::post('/cmsaction','CmsPageController@storeDevice');
    Route::get('/view_cms_page','CmsPageController@indexcms');
    Route::get('/click_editcms/{id}','CmsPageController@editcms');
    Route::post('/updatecms/{id}','CmsPageController@updatecms')->name('updatecms');
    Route::get('click_deletecms/{id}','CmsPageController@deletecms');

    Route::match(['get','post'],'/pages/{url}','CmsPageController@cmsPage');


Route::match(['get','post'],'/newsletter','NewslettersController@storesubcription');

    Route::get('/view-subscriptions','NewslettersController@display');
    Route::get('/click_proceedSubcription/{id}','NewslettersController@respond');
    Route::post('/adminreply/{id}','NewslettersController@adminreply')->name('adminreply');


Route::get('order-proceed/{id}','OrderStatusController@proceedorder');


Route::put('update-tracking-status/{id}','OrderStatusController@trackingstatus');
Auth::routes();

