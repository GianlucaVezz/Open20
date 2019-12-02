<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\comuni\widgets\helpers\views
 * @category   CategoryName
 */

use lispa\amos\comuni\AmosComuni;

/**
 * @var \lispa\amos\comuni\widgets\helpers\AmosComuniWidget $widget
 * @var \lispa\amos\core\forms\ActiveForm $form
 * @var \lispa\amos\core\record\Record $model
 * @var array $nazioneConfig
 * @var array $provinciaConfig
 * @var array $comuneConfig
 * @var array $capConfig
 * @var string $colMdRow
 */

//id del campo: se specificato nelle option uso quello, altrimenti sarà nel formato 'campo_db-id'
$provinciaAttribute = $provinciaConfig['attribute'];
$id = isset($provinciaConfig['options']['id']) ? $provinciaConfig['options']['id'] : $widget->generateFieldId($model, $provinciaAttribute);

?>

<div class="<?= isset($provinciaConfig['class']) ? $provinciaConfig['class'] : 'col-md-' . $colMdRow; ?>">
    <?= $form->field($model, $provinciaAttribute)->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\lispa\amos\comuni\models\IstatProvince::find()->orderBy('nome')->asArray()->all(), 'id', 'nome'),
        'options' => array_merge(
            [
                'placeholder' => AmosComuni::t('amoscomuni', '#select_province_placeholder'),
                'id' => $id,
            ], !empty($provinciaConfig['options']) ? $provinciaConfig['options'] : []
        ),
        'pluginOptions' => array_merge(
            [
                'allowClear' => true
            ], !empty($provinciaConfig['pluginOptions']) ? $provinciaConfig['pluginOptions'] : []
        ),
    ]);
    ?>
</div>
