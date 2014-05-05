<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\amcharts;

use yii\web\AssetBundle;

/**
 * @author Alexander Yaremchuk <alwex10@gmail.com>
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 * @since 1.0
 */
class AmChartAsset extends AssetBundle
{
    public $sourcePath = '@yii/amcharts/assets';
    public $css = [];
    public $js = [
        'js/amcharts.js',
        'js/funnel.js',
        'js/gauge.js',
        'js/pie.js',
        'js/radar.js',
        'js/serial.js',
        'js/xy.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}