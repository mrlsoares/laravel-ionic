<?php

use Illuminate\Support\Facades\Response;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/home', function () {
    return view('layouts.app');
});



Route::group(['prefix'=>'admin','middleware'=>'auth.checkrole:admin'],function(){
    Route::auth();

    Route::group(['prefix'=>'categories'],function(){
        Route::get('', ['as'=>'admin.categories.index','uses'=>'CategoriesController@index']);
        Route::get('create', ['as'=>'admin.categories.create','uses'=>'CategoriesController@create']);
        Route::get('edit/{id}', ['as'=>'admin.categories.edit','uses'=>'CategoriesController@edit']);
        Route::post('store', ['as'=>'admin.categories.store','uses'=>'CategoriesController@store']);
        Route::put('update/{id}', ['as'=>'admin.categories.update','uses'=>'CategoriesController@update']);
        Route::get('delete/{id}', ['as'=>'admin.categories.delete','uses'=>'CategoriesController@destroy']);
    });

    Route::group(['prefix'=>'products'],function(){
        Route::get('', ['as'=>'admin.products.index','uses'=>'ProductsController@index']);
        Route::get('create', ['as'=>'admin.products.create','uses'=>'ProductsController@create']);
        Route::get('edit/{id}', ['as'=>'admin.products.edit','uses'=>'ProductsController@edit']);
        Route::post('store', ['as'=>'admin.products.store','uses'=>'ProductsController@store']);
        Route::put('update/{id}', ['as'=>'admin.products.update','uses'=>'ProductsController@update']);
        Route::get('delete/{id}', ['as'=>'admin.products.delete','uses'=>'ProductsController@destroy']);
    });

    Route::group(['prefix'=>'clients'],function(){
        Route::get('', ['as'=>'admin.clients.index','uses'=>'ClientsController@index']);
        Route::get('create', ['as'=>'admin.clients.create','uses'=>'ClientsController@create']);
        Route::get('edit/{id}', ['as'=>'admin.clients.edit','uses'=>'ClientsController@edit']);
        Route::post('store', ['as'=>'admin.clients.store','uses'=>'ClientsController@store']);
        Route::put('update/{id}', ['as'=>'admin.clients.update','uses'=>'ClientsController@update']);
        Route::delete('delete/{id}', ['as'=>'admin.clients.delete','uses'=>'ClientsController@destroy']);
    });

    Route::group(['prefix'=>'orders'],function(){
        Route::get('', ['as'=>'admin.orders.index','uses'=>'OrdersController@index']);
        //Route::get('create', ['as'=>'create','uses'=>'OrdersController@create']);
        Route::get('edit/{id}', ['as'=>'admin.orders.edit','uses'=>'OrdersController@edit']);
        // Route::post('store', ['as'=>'store','uses'=>'OrdersController@store']);
        Route::put('update/{id}', ['as'=>'admin.orders.update','uses'=>'OrdersController@update']);
        // Route::delete('delete/{id}', ['as'=>'delete','uses'=>'OrdersController@destroy']);
    });
    Route::group(['prefix'=>'cupoms'],function(){
        Route::get('', ['as'=>'admin.cupoms.index','uses'=>'CupomsController@index']);
        Route::get('create', ['as'=>'admin.cupoms.create','uses'=>'CupomsController@create']);
        Route::get('edit/{id}', ['as'=>'admin.cupoms.edit','uses'=>'CupomsController@edit']);
        Route::post('store', ['as'=>'admin.cupoms.store','uses'=>'CupomsController@store']);
        Route::put('update/{id}', ['as'=>'admin.cupoms.update','uses'=>'CupomsController@update']);
        Route::delete('delete/{id}', ['as'=>'admin.cupoms.delete','uses'=>'CupomsController@destroy']);
    });

    

});
Route::group(['prefix'=>'customer','as'=>'customer.','middleware'=>'auth.checkrole:client'],function(){
    Route::group(['prefix'=>'order','as'=>'order.'],function(){
        Route::get('', ['as'=>'index','uses'=>'CheckoutController@index']);
        Route::get('create', ['as'=>'create','uses'=>'CheckoutController@create']);
        Route::get('edit/{id}', ['as'=>'edit','uses'=>'CheckoutController@edit']);
        Route::post('store', ['as'=>'store','uses'=>'CheckoutController@store']);
        Route::put('update/{id}', ['as'=>'update','uses'=>'CheckoutController@update']);
        Route::delete('delete/{id}', ['as'=>'delete','uses'=>'CheckoutController@destroy']);
    });
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/





Route::group(['middleware' => 'web'], function () {
    Route::auth();

 //   Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'cors'], function(){
    /*$router->get('api', 'ApiController@index');*/
    Route::post('oauth/access_token', function() {
        return Response::json(Authorizer::issueAccessToken());
    });
    Route::group(['prefix'=>'client','as'=>'client.','middleware'=>'oauth.checkrole:client'],function(){
        Route::Resource('order',
            'Api\Client\ClientCheckoutController',
            ['except'=>['create','edit','destroy']]
        );

    });
    Route::group(['prefix'=>'deliveryman','as'=>'deliveryman.','middleware'=>'oauth.checkrole:deliveryman'],function() {
        Route::Resource('order',
            'Api\Deliveryman\DeliverymanCheckoutController',
            ['except' => ['create', 'edit', 'destroy', 'store']]
        );
        Route::patch('order/{id}/update-status', [
            'uses' => 'Api\Deliveryman\DeliverymanCheckoutController@updateStatus',
            'as' => 'order.update_status'
        ]);
    });
});



