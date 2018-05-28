<?php

use Illuminate\Routing\Router;

Route::group([
    
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),

], function (Router $router) {
    
    $router->get('/welcome', function () {
    	return view('welcome');	
    });
    $router->get('/', 'DashboardController@index')->name('home');
    $router->resource('/product', ProductController::class, [
    	'names' => [
	        'index' => 'product',
	        'create' => 'product.create',
            'store' => 'product.store',
            'edit' => 'product.edit',
	        'update' => 'product.update',
            'destroy' => 'product.destroy',
    	]
    ]);
    
});



