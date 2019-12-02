<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\sondaggi\migrations
 * @category   CategoryName
 */

use lispa\amos\core\migration\AmosMigrationWidgets;
use lispa\amos\dashboard\models\AmosWidgets;

/**
 * Class m180911_080545_new_compila_sondaggi_widgets
 */
class m180911_080545_new_compila_sondaggi_widgets extends AmosMigrationWidgets
{
    const MODULE_NAME = 'sondaggi';

    /**
     * @inheritdoc
     */
    protected function initWidgetsConfs()
    {
        $this->widgets = [
            [
                'classname' => \lispa\amos\sondaggi\widgets\icons\WidgetIconCompilaSondaggiOwnInterest::className(),
                'type' => AmosWidgets::TYPE_ICON,
                'module' => self::MODULE_NAME,
                'status' => AmosWidgets::STATUS_ENABLED,
                'child_of' => \lispa\amos\sondaggi\widgets\icons\WidgetIconCompilaSondaggi::className(),
                'default_order' => 10,
                'dashboard_visible' => 0
            ],
            [
                'classname' => \lispa\amos\sondaggi\widgets\icons\WidgetIconCompilaSondaggiAll::className(),
                'type' => AmosWidgets::TYPE_ICON,
                'module' => self::MODULE_NAME,
                'status' => AmosWidgets::STATUS_ENABLED,
                'child_of' => \lispa\amos\sondaggi\widgets\icons\WidgetIconCompilaSondaggi::className(),
                'default_order' => 20,
                'dashboard_visible' => 0
            ]
        ];
    }
}
