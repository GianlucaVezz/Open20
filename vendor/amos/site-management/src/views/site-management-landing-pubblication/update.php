<?php

use yii\helpers\Html;
use amos\sitemanagement\Module;

/**
* @var yii\web\View $this
* @var amos\sitemanagement\models\SiteManagementLandingPubblication $model
*/

$this->title = Module::t('amossitemanagement', 'Update landing pubblication');

$this->params['breadcrumbs'][] = ['label' => Yii::t('cruds', 'Site Management Landing Pubblication'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Aggiorna');
?>
<div class="site-management-landing-pubblication-update">

    <?= $this->render('_form', [
        'model' => $model,
        'routes' => $routes

    ]) ?>

</div>
