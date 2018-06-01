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
     * Route configuration.
     */
    'route' => [
        'file' => base_path() . '/routes/admin.php',
        'prefix' => 'admin',
        'namespace' => 'App\\Admin\\Controllers',
        'middleware' => ['web'], // Must be ['web', 'admin'] admin middleware (auth and etc...)
    ],

    /*
     * Admin install directory.
     */
    'directory' => [
        'admin' => app_path('Admin'),
    ],

    /*
     * Admin upload setting.
     */
    'upload' => [
        'disk' => 'admin',
        'directory' => [
            'image' => 'images',
            'file' => 'files',
        ],
    ],

    /*
     * Version.
     */
    'version' => '1.0',

];