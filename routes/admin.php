<?php

use Illuminate\Routing\Router;

Route::group([

    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),

], function (Router $router) {

    $router->get('/', 'DashboardController@index')->name('home');
    $router->get('/product', 'ProductController@index')->name('product');
    $router->get('/product/grid', 'ProductController@grid')->name('product.grid');
    $router->get('/product/create', 'ProductController@create')->name('product.create');
    $router->get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');
    $router->delete('/product/{id}', 'ProductController@destroy')->name('product.destroy');
    $router->post('/product/store', 'ProductController@store')->name('product.store');
    $router->post('/product/{id}/update', 'ProductController@update')->name('product.update');
    // $router->resource('/product', ProductController::class, [
    //     'names' => [
    //         'index' => 'product',
    //         'create' => 'product.create',
    //         'store' => 'product.store',
    //         'edit' => 'product.edit',
    //         'update' => 'product.update',
    //         'destroy' => 'product.destroy',   
    //     ]
    // ]);

});



