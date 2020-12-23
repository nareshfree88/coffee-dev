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

Route::get('white-rock', function() {
    return view('user/location/location-1');
});
Route::get('surry-location', function() {
    return view('user/location/location-2');
});

//Route::get('reccring-payment',function(){
//    return view('user/subscribe/recrring_subscribe');
//});

Route::post('/newslatter', 'NewslatterController@NewsLatter');


Route::get('recurring-payment/{pack}', 'SubscribeController@reccuringIndex');
Route::post('recurring-payment', 'SubscribeController@reccuringPost')->name('recuring.post');

Route::get('product_subscription', function() {
    return view('user/page/product_subscription');
});

//Route::get('/aeropress',function(){
//    return view('user/brew-recipies/aeropress');
//});
//Route::get('/coffeemaker',function(){
//    return view('user/brew-recipies/coffeemaker');
//});
//Route::get('/chemex',function(){
//    return view('user/brew-recipies/chemex');
//});
//Route::get('/cold-brew',function(){
//    return view('user/brew-recipies/cold-brew');
//});
//Route::get('/espresso',function(){
//    return view('user/brew-recipies/espresso');
//});
//Route::get('/french-press',function(){
//    return view('user/brew-recipies/french-press');
//});
//Route::get('/v60',function(){
//    return view('user/brew-recipies/v60');
//});

Route::get('CreateProduct', 'SubscribeController@CreateProduct');


Route::get('/profile', 'SubscribeController@profile');
Route::get('/account-info', 'Admin\UsersController@getAccountInfo');
Route::post('/account-info', 'Admin\UsersController@updateDetails')->name('update.info');
Route::get('/address-details', 'Admin\AddressesController@address_details');
Route::get('/order-history', 'Admin\OrdersController@order_history');

Route::get('/subscribe-now/{pack}', 'SubscribeController@index')->middleware('subscription');
Route::post('/subscribe-now', 'SubscribeController@store')->name('subscribe.now');

Route::get('/cancel', [
    'before' => 'csrf',
    'as' => 'subscription-cancel',
    'uses' => 'SubscribeController@getCancel'
]);

//Google Login
Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');
//End 
//Facebook Login
Route::get('login/facebook', 'Auth\LoginController@redirectTo_fb_Provider');
Route::get('login/facebook/callback', 'Auth\LoginController@handle_fb_ProviderCallback');
//End 



Route::get('/', ['uses' => 'HomeController@index']);
Route::get('/newMian', ['uses' => 'HomeController@NewMain']);

Route::get('/FAQ', function() {
    return view('user/page/faq');
});

Route::get('lang/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('currency/{curency}', function($curency) {
    App\Http\Support\Helper::convertion($curency);
    return redirect()->back();
});

Route::get('currency/{currency}', function ($currency) {
    session()->put('currency', $currency);

    return redirect()->back();
});

Route::get('/email', function() {
    return view('email/subscription_mail');
});
Route::get('/brewing', function() {
    return view('user/page/brewing');
});
Route::get('/about-us', function() {
    return view('user/page/about-us');
});
Route::get('/impact', function() {
    return view('user/page/impact');
});
Route::get('/work-with-us', function() {
    return view('user/page/work-with-us');
});


Route::get('giftSubscription-history','HomeController@giftSubscriptionHistory');
Route::get('giftSubscription-history/{id}','HomeController@TrackGiftSubscription');


Route::post('subscribe', 'Admin\TrysubscriptionsController@subscribe')->name('subscribe.post');


Route::get('claim', 'Admin\SubscriptionsController@claimView');
Route::post('claim', 'Admin\SubscriptionsController@claimPost')->name('clam.subscription');
Route::post('gift_claiming_address', 'Admin\SubscriptionsController@claimShippingAddress');
Route::get('equipment', 'ProductsController@equipmentIndex');
Route::get('/all', 'ProductsController@allProducts');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/coffee', 'ProductsController@index');
Route::get('/show/{id}', 'ProductsController@show');
//Route::get('equipments', 'EquipmentController@index');
Route::post('/addItem', 'ProductsController@addItem');
Route::post('discounts', 'Admin\DiscountsController@getDiscount')->name('get.discount');
Route::post('change/status', 'Admin\DiscountsController@changeStatus')->name('active.discount');
Route::get('delete_item/{id}', ['uses' => 'ProductsController@delete', 'as' => 'delete.item']);
Route::get('delete_item', ['uses' => 'ProductsController@DeleteTrySubscription', 'as' => 'delete.Trysubscription']);
Route::get('delete_gift_item/{id}', ['uses' => 'ProductsController@deleteGiftSubscription', 'as' => 'delete.gift']);

//checkout
Route::get('/checkout', 'Admin\AddressesController@checkoutView')->middleware('auth');
Route::post('shipping/store', 'Admin\AddressesController@shippingAddress')->middleware('stripe');
//Stripe Payment Gateway
Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post')->middleware('stripe');
//End Stripe Payment Gateway


// Paypal payment gateway
Route::post('create', 'PaypalController@create');
Route::get('execute-payment', 'PaypalController@execute');
Route::get('createPlan', 'PaypalController@CreatePlan');
Route::get('list/plan', 'PaypalController@ListPlan');
Route::get('plan/{id}', 'PaypalController@PlanDetails');
Route::get('plan/{id}/activate', 'PaypalController@activate');
Route::post('plan/{id}/activate', 'PaypalController@CreateAgreement')->name('create-agreement');
Route::get('execute-agreement/{success}','PaypalController@executeAgreement');

// End Paypal payment gateway
Route::post('/save-paypal-payment', 'StripePaymentController@paypalPayment')->middleware('stripe');
Route::get('/order-success', 'StripePaymentController@order_success');
Route::get('payment-error', function() {
    return view('user/payment/error');
});
//end checkout

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();



Route::get('gift-subscription', 'ProductsController@giftSubscriptionView');
Route::post('/gift-subscription', 'ProductsController@giftSubscription')->name('gift.subscription');


Route::get('subscribe', 'Admin\TrysubscriptionsController@wholeBeans');

Route::post('email_password_reset_token', ['uses' => 'Auth\PasswordController@validatePasswordRequest'])->name('emailToken');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::post('reset_password_with_token', 'PasswordController@resetPassword')->name('token.resetPassword');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
    Route::get('/', ['uses' => 'AdminController@index']);
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('users', 'UsersController');
    Route::resource('pages', 'PagesController');

    Route::resource('videos', 'VideosController');

    Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
    Route::resource('activitylogs', 'ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);
    Route::resource('settings', 'SettingsController');
    
    Route::resource('subscriptions', 'SubscriptionsController');
//    Route::get('recurring', 'SubscriptionsController@RecurringIndex');
//    Route::get('recurring/show/{id}', 'SubscriptionsController@RecurringShow');
    //    Route::resource('subscription_plans', 'Subscription_plansController');
    Route::resource('payments', 'PaymentsController');
    Route::resource('orders', 'OrdersController');
    Route::post('orders', 'OrdersController@OrderStatus')->name('order-status');
    Route::post('gift-subscription', 'SubscriptionsController@SubscriptionStatus')->name('gift-subscription');
    Route::post('try-subscriptions', 'TrysubscriptionsController@TrySubscriptionStatus')->name('try-subscription');
    
    
    
    Route::resource('email-content', 'EmailContentController');
    
    Route::resource('discounts', 'DiscountsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('equipments', 'EquipmentsController');
    Route::resource('posts', 'PostsController');
    Route::get('sales', function() {
        return view('admin/sales/index');
    });


//    Route::get('products', function() {
//        return view('admin/products/index');
//    });
//    Route::get('orders', function() {
//        return view('admin/orders/index');
//    });
//    Route::get('attributes','AttributesContriller@index');
//    Route::get('attributes/create','AttributesContriller@create');
    Route::resource('products', 'ProductsController');
    Route::resource('attributes', 'AttributesController');
    Route::resource('invites', 'InvitesController');


//    Route::resource('addresses/{id}', 'AddressesController');
    Route::get('addresses/{user_addr}', 'AddressesController@index');
    Route::get('addresses/show/{id}/{user_addr}', 'AddressesController@show');
    Route::get('addresses/create/{user_addr}', 'AddressesController@create');
    Route::post('addresses/store', 'AddressesController@store');
    Route::DELETE('addresses/delete/{id}/{user_addr}', 'AddressesController@destroy');
    Route::get('/addresses/{id}/edit/{user_addr}', 'AddressesController@edit');
    Route::PATCH('addresses/edit/{id}/{user_addr}', 'AddressesController@update');
    
    Route::resource('trysubscriptions', 'TrysubscriptionsController');
});

Route::get('401', function() {
    return view('admin/access');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



