<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    lispa\amos\community\migrations
 * @category   CategoryName
 */

use lispa\amos\dashboard\models\AmosWidgets;
use lispa\amos\core\migration\AmosMigrationWidgets;

/**
 * Class m190521_174819_init_widget_graphics_communities_recommended
 */
class m190521_174819_init_widget_graphics_communities_recommended extends AmosMigrationWidgets
{
    const MODULE_NAME = 'community';

    /**
     * @inheritdoc
     */
    protected function initWidgetsConfs()
    {
        $this->widgets = [
            [
                'classname' => \lispa\amos\community\widgets\graphics\WidgetGraphicsCommunitiesRecommended::className(),
                'type' => AmosWidgets::TYPE_GRAPHIC,
                'module' => self::MODULE_NAME,
                'status' => AmosWidgets::STATUS_DISABLED,
                'child_of' => null,
                'default_order' => 150,
                'dashboard_visible' => 1
            ],
        ];
    }
}
