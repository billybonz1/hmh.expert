<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/clear-cache-all', function() {

    Artisan::call('config:cache');
    Artisan::call('view:clear');


    dd("Cache Clear All");

});


Route::get('/migrate', function() {

    Artisan::call('migrate');


    dd("Migrated");

});


Route::redirect('/home', '/');

/*
|------------------------------------------
| Website
|------------------------------------------
*/

Route::group(['namespace' => 'Website'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/news/{categorySlug?}', 'NewsController@index')->name('news');
    Route::get('/articles/{categorySlug}/{newsSlug}', 'NewsController@show');

    Route::get('/contact-us', 'ContactUsController@index')->name('contact');
    Route::post('/contact-us/submit', 'ContactUsController@feedback');

    // faq
    Route::namespace('FAQ')->group(function () {
        Route::get('/faq', 'FAQController@index');
        Route::post('/faq/question/{faq}/{type?}', 'FAQController@incrementClick');
    }); 

    // shop
    Route::group(['namespace' => 'Shop'], function () {
        Route::post('/products/filter', 'ShopController@filter');
        Route::get('/products/basket', 'BasketController@index');
        Route::post('/products/basket', 'BasketController@submitBasket');
        Route::get('/products/show/{productSlug}', 'ShopController@show');

        Route::group(['middleware' => ['auth']], function () {
            Route::get('/products/basket/address', 'BasketController@showAddress');
            Route::post('/products/basket/address', 'BasketController@submitAddress');
            Route::get('/products/basket/checkout', 'BasketController@showCheckout');
            Route::post('/products/basket/checkout', 'BasketController@submitCheckout');
            Route::get('/products/basket/checkout/feedback', 'BasketController@showCheckoutFeedback');
            Route::get('/products/basket/add/{product}/{quantity?}', 'BasketController@addProduct');
            Route::get('/products/basket/remove/{product}', 'BasketController@removeProduct');
        });

        Route::get('/products/{slugs?}', 'ShopController@index')->where('slugs', '(.*)');
    });
});

/*
|------------------------------------------
| Website Account
|------------------------------------------
*/
Route::group(
    ['middleware' => ['auth'], 'prefix' => 'account', 'namespace' => 'Website\Account'],
    function () {
        Route::get('/', 'AccountController@index')->name('account');
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::post('/profile', 'ProfileController@update');
        Route::get('/orders', 'AccountController@transactions');
        Route::get('/orders/{reference}', 'AccountController@showTransaction');
        Route::get('/orders/{reference}/print', 'AccountController@printTransaction');

        Route::get('/address', 'ShippingAddressController@index');
        Route::post('/address', 'ShippingAddressController@update');
    }
);

/*
|------------------------------------------
| Authenticate User
|------------------------------------------
*/
Route::group(['prefix' => 'auth'], function () {
    Auth::routes(['verify' => true]);

    // Route::any('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::get('/refresh_captcha', 'Auth\RegisterController@refreshCaptcha')->name('refresh_captcha');
Route::get('/profile', 'ProfileController@index')->name("profile");
Route::post('/profile', 'ProfileController@update');
Route::get('/profile/password', 'ProfileController@password')->name("profile.password");
Route::post('/profile/password', 'ProfileController@passwordUpdate');
Route::get('/profile/blog', 'ProfileController@blog')->name("profile.blog");
Route::get('/profile/messages', 'ProfileController@messages')->name("profile.messages");
Route::get('/profile/messages/{url}', 'ProfileController@messages')->where('url','^[a-zA-Z0-9-:,_\/]+$');
Route::post('/profile/messages', 'ProfileController@getMessages');
Route::put('/profile/messages', 'ProfileController@sendMessage');
Route::post('/profile/messages/read', 'ProfileController@readMessages');
Route::post('/profile/avatar', 'ProfileController@avatarUpdate');
Route::get('/profile/balance', 'ProfileController@balance')->name("profile.balance");
Route::post('/profile/balance', 'ProfileController@updateBalance');
Route::post('/profile/pay', 'ProfileController@pay');
Route::get('/profile/personal', 'ProfileController@personal')->name("profile.personal");
Route::post('/profile/personal', 'ProfileController@personalUpdate');



Route::get('/profile/blog/create', 'ProfileController@postCreate')->name("profile.postCreate");
Route::post('/profile/blog/create', 'ProfileController@postStore');
Route::post('/profile/blog/update', 'ProfileController@postUpdate');

Route::get('/profile/blog/{id}', 'ProfileController@blogshow');

Route::put('/profile/groupmessages', 'ProfileController@sendGroupMessage');
Route::get("/profile/services", 'ProfileController@services')->middleware("can:edit-expert")->name("profile.services");
Route::get('/profile/services/create', 'ProfileController@serviceCreate')->middleware("can:edit-expert")->name("profile.serviceCreate");
Route::post('/profile/services/add', 'ProfileController@serviceStore')->middleware("can:edit-expert");
Route::post('/profile/services/update', 'ProfileController@serviceUpdate');
Route::get('/profile/service/{id}', 'ProfileController@serviceshow');

Route::post('/profile/likepost', 'ProfileController@likePost');
Route::post('/profile/add-to-favourite', 'ProfileController@addToFavourite');
Route::post('/profile/remove-favourite', 'ProfileController@removeFavourite');


Route::get('/profile/orders', 'ProfileController@orders')->name("orders");


Route::get('/blogs', 'BlogsController@index')->name("blogs");
Route::get('/blogs/{url}', 'BlogsController@render')->where('url','^[a-zA-Z0-9-:,_\/]+$');

Route::get('/services', 'ServicesController@index')->name("services");
Route::get('/services/{url}', 'ServicesController@render')->where('url','^[a-zA-Z0-9-:,_\/]+$');



Route::get('/profile/expert', 'ProfileController@expert')->name('profile.expert')->middleware("can:edit-expert");
Route::post('/profile/expert', 'ProfileController@expertUpdate')->middleware("can:edit-expert");


Route::get('/get-services', 'ExpertsCategoryController@getServices')->name('get_services');
Route::get('/get-reviews', 'ExpertsCategoryController@getReviews')->name('get_reviews');

Route::post('/get-service-price', 'ExpertsCategoryController@getServicePrice')->name('get_service_price');





Route::get('/calendar', 'CalendarController@index')->name('calendar');



/*
|------------------------------------------
| Dynamic Pages - up to 3 slugs
|------------------------------------------
*/
Route::get('/experts', 'ExpertsCategoryController@index');
Route::get('/experts/{slug}', 'ExpertsCategoryController@category');
Route::get('/experts/{slug2}/{slug}', 'ExpertsCategoryController@category');
Route::post('/experts/addreview', 'ExpertsCategoryController@addReview')->middleware("auth");
Route::get('/users/{nickname}', 'UsersCategoryController@index');
Route::get('/favourite', 'FavouriteController@index')->name("favourite");


Route::group(['namespace' => 'Website'], function () {
    Route::get('{slug1}/{slug2?}/{slug3?}', 'PagesController@index');
});
