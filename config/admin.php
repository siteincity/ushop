<?php

return [

    /*
     * Description.
     */
    'name' => 'UShopAdmin',
    'logo' => '<b>EVA</b> shop',
    'logo-mini' => '<b>EVA</b>',
    'title' => 'Admin',


    /*
     * Admin install directory.
     */
    'directory' => [
        'admin' => app_path('Admin'),
        // 'views' => base_path() . '/resources/views/admin',
    ],
    

    /*
     * Route configuration.
     */
    'route' => [
        'file' => base_path() . '/routes/admin.php',
        'prefix' => 'admin',
        'namespace' => 'App\\Admin\\Controllers',
        'middleware' => ['web'], // Must be ['web', 'admin'] admin middleware (auth and etc...)
    ],


    /*
     * Admin upload setting.
     */
    // 'upload' => [
    //     'disk' => 'admin',
    //     'directory' => [
    //         'image' => 'images',
    //     ],
    // ],

    /*
     * Version.
     */
    'version' => '1.0',

];