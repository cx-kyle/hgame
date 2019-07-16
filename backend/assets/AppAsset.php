<?php
namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Class AppAsset
 * @package backend\assets
 *   
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/resources';

    public $css = [
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css',
        'plugins/toastr/toastr.min.css', // 状态通知
        'plugins/fancybox/jquery.fancybox.min.css', // 图片查看
        'plugins/cropper/dist/cropper.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/upload.css',
        'dist/css/wechat.css',
        'dist/css/rageframe.css',
        'dist/css/rageframe.widgets.css',
    ];

    public $js = [
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/fastclick/lib/fastclick.js',
        'plugins/layer/layer.js',
        'plugins/sweetalert/sweetalert.min.js',
        'dist/js/adminlte.js',
        'dist/js/demo.js',
        'dist/js/template.js',
        'dist/js/ueditor.all.min.js',
        'plugins/fancybox/jquery.fancybox.min.js',
        'dist/js/rageframe.js',
        'dist/js/rageframe.widgets.js',
    ];

    public $depends = [
        YiiAsset::class,
        CompatibilityIEAsset::class,
        HeadJsAsset::class,
    ];
}
