<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/default/';
    public $css = [
//        'assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css',
//        'assets/css/preloader.min.css',
        'assets/css/bootstrap.min.css',
        'assets/css/icons.min.css',
        'assets/css/app.min.css',
        'assets/css/site.css',
    ];
    public $js = [
//        'assets/libs/jquery/jquery.min.js',
        'assets/libs/bootstrap/js/bootstrap.bundle.min.js',
        'assets/libs/metismenu/metisMenu.min.js',
        'assets/libs/simplebar/simplebar.min.js',
        'assets/libs/node-waves/waves.min.js',
        'assets/libs/feather-icons/feather.min.js',
//        'assets/libs/pace-js/pace.min.js',
        'assets/libs/apexcharts/apexcharts.min.js',
//        'assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js',
//        'assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js',
//        'assets/js/pages/dashboard.init.js',
        'assets/js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap4\BootstrapAsset',
    ];
}
