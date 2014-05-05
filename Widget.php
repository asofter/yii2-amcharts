<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\amcharts;

use Yii;
use yii\web\View;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

/**
 * AmChart Widget For Yii2 class file.
 *
 * @property array $plugins
 *
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 * @author Alexander Yaremchuk <alwex10@gmail.com>
 *
 * @version 1.0
 *
 * @link https://github.com/asofter/yii2-amcharts
 * @link http://www.amcharts.com/
 */

class Widget extends \yii\base\Widget
{
    /**
     * @var array the HTML attributes for the breadcrumb container tag.
     */
    public $options = [];
    /**
     * @var string the width of the chart
     */
    public $width = '640px';
    /**
     * @var string the height of the chart
     */
    public $height = '400px';
    /**
     * @var array the AmChart configuration array
     * @see http://docs.amcharts.com/3/javascriptcharts
     */
    public $chartConfiguration = [];

    protected $_chartDivId;

    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = 'chartdiv-' . $this->getId();
        }
        $this->chartDivId = $this->options['id'];
        AmChartAsset::register($this->getView());

        parent::init();
    }

    public function run()
    {
        $this->makeChart();
        $this->options['style'] = "width: {$this->width}; height: {$this->height};";
        echo Html::tag('div', '', $this->options);
    }

    protected function makeChart()
    {
        $chartConfiguration = json_encode($this->chartConfiguration);
        $js = "AmCharts.makeChart('{$this->chartDivId}', {$chartConfiguration});";
        $this->getView()->registerJs($js, View::POS_READY);
    }

    protected function setChartDivId($value)
    {
        $this->_chartDivId = $value;
    }

    protected function getChartDivId()
    {
        return $this->_chartDivId;
    }
}