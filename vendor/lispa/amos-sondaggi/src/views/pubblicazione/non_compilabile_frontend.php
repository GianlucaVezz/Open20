<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\sondaggi\views\pubblicazione
 * @category   CategoryName
 */

use lispa\amos\sondaggi\AmosSondaggi;
use lispa\amos\core\icons\AmosIcons;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var lispa\amos\sondaggi\models\search\SondaggiSearch $searchModel
 */
$this->title = AmosSondaggi::t('amossondaggi', 'Sondaggio terminato');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sondaggi-index text-center sondaggi-warning">
    <?php
    if (!empty($pubblicazioni->one()->text_not_compilable) && strlen(trim($pubblicazioni->one()->text_not_compilable))) {
        if ($pubblicazioni->one()->text_not_compilable_html == 1) {
            ?>
            <?= $pubblicazioni->one()->text_not_compilable ?>
            <?php
        } else {
            ?>
            <h4><?= $pubblicazioni->one()->text_not_compilable ?></h4>
            <?php
        }
    } else {
        ?>
             <?= AmosIcons::show('alert-triangle', [
            'class' => 'am-4 warning m-t-15'
        ]) ?>
         <h2 class="p-t-5 nom-b"><?= AmosSondaggi::t('amossondaggi', 'Attenzione') ?></h2>
         <h3><?= AmosSondaggi::t('amossondaggi', 'Sondaggio già compilato o non compilabile') ?></h3>
          <?= Html::a(AmosSondaggi::t('amossondaggi', 'Chiudi'), Url::previous(), [
        'class' => 'btn btn-secondary undo-edit mr10'
    ]); ?>
    <?php } ?>
</div>
