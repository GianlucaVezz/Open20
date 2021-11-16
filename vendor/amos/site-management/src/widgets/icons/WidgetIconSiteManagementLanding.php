<?php

/**
 * Lombardia Informatica S.p.A.
 * OPEN 2.0
 *
 *
 * @package    amos\sitemanagement\widgets\icons
 * @category   CategoryName
 */

namespace amos\sitemanagement\widgets\icons;

use amos\sitemanagement\Module;
use open20\amos\core\widget\WidgetIcon;
use yii\helpers\ArrayHelper;

/**
 * Class WidgetIconSiteManagementElement
 * @package amos\sitemanagement\widgets\icons
 */
class WidgetIconSiteManagementLanding extends WidgetIcon
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->setLabel(Module::tHtml('amossitemanagement', 'Advertising landing'));
        $this->setDescription(Module::t('amossitemanagement', 'Advertising landing'));
        $this->setIcon('linentita');
        $this->setUrl(['/sitemanagement/site-management-landing/index']);
        $this->setCode('SITE_MANAGEMENT_LANDING');
        $this->setModuleName('sitemanagement');
        $this->setNamespace(__CLASS__);
        $this->setClassSpan(ArrayHelper::merge($this->getClassSpan(), [
            'bk-backgroundIcon',
            'color-lightPrimary'
        ]));
    }
}
