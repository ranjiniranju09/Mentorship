<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

<<<<<<< HEAD
    'default' => env('FILESYSTEM_DISK', 'local'),
=======
    'default' => env('FILESYSTEM_DRIVER', 'local'),
>>>>>>> 0c87cc8 (mentor2)

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
<<<<<<< HEAD
    | been set up for each driver as an example of the required values.
=======
    | been setup for each driver as an example of the required options.
>>>>>>> 0c87cc8 (mentor2)
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
<<<<<<< HEAD
            'throw' => false,
=======
>>>>>>> 0c87cc8 (mentor2)
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
<<<<<<< HEAD
            'throw' => false,
=======
>>>>>>> 0c87cc8 (mentor2)
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
<<<<<<< HEAD
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        'disks' => [
            'uploads' => [
                'driver' => 'local',
                'root' => public_path('uploads'), // Specifies the root directory for file storage
                'url' => env('APP_URL').'/uploads', // Specifies the URL for accessing files
                'visibility' => 'public',
            ],
        ],
        

=======
            // 'endpoint' => env('AWS_ENDPOINT'),
        ],

>>>>>>> 0c87cc8 (mentor2)
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
