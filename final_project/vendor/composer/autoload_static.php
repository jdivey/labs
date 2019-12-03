<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfbb8414576cc568200e30066da1620cc
{
    public static $classMap = array (
        'ComposerAutoloaderInitfbb8414576cc568200e30066da1620cc' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitfbb8414576cc568200e30066da1620cc' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/index_view.class.php',
        'Vehicle' => __DIR__ . '/../..' . '/models/vehicle.class.php',
        'VehicleController' => __DIR__ . '/../..' . '/controllers/vehicle_controller.class.php',
        'VehicleDetail' => __DIR__ . '/../..' . '/views/vehicle/detail/vehicle_detail.class.php',
        'VehicleEdit' => __DIR__ . '/../..' . '/views/vehicle/edit/vehicle_edit.class.php',
        'VehicleError' => __DIR__ . '/../..' . '/views/vehicle/error/vehicle_error.class.php',
        'VehicleIndex' => __DIR__ . '/../..' . '/views/vehicle/index/vehicle_index.class.php',
        'VehicleIndexView' => __DIR__ . '/../..' . '/views/vehicle/vehicle_index_view.class.php',
        'VehicleModel' => __DIR__ . '/../..' . '/models/vehicle_model.class.php',
        'VehicleSearch' => __DIR__ . '/../..' . '/views/vehicle/search/vehicle_search.class.php',
        'WelcomeController' => __DIR__ . '/../..' . '/controllers/welcome_controller.class.php',
        'WelcomeIndex' => __DIR__ . '/../..' . '/views/welcome/welcome_index.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitfbb8414576cc568200e30066da1620cc::$classMap;

        }, null, ClassLoader::class);
    }
}
