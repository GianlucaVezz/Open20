<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\core\views\assets
 * @category   CategoryName
 */

namespace lispa\amos\core\views\assets;

use yii\web\AssetBundle;

class AmosMapAsset extends AssetBundle {

    public $sourcePath = '@vendor/lispa/amos-core/views/assets/web';
    public $css = [
    ];
    public $js = [
        'js/oms.min.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}