<?php

namespace lispa\amos\notificationmanager\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "notificationconf_network".
 */
class NotificationconfNetwork extends \lispa\amos\notificationmanager\models\base\NotificationconfNetwork
{
    public function representingColumn()
    {
        return [
//inserire il campo o i campi rappresentativi del modulo
        ];
    }

    public function attributeHints()
    {
        return [
        ];
    }

    /**
     * Returns the text hint for the specified attribute.
     * @param string $attribute the attribute name
     * @return string the attribute hint
     */
    public function getAttributeHint($attribute)
    {
        $hints = $this->attributeHints();
        return isset($hints[$attribute]) ? $hints[$attribute] : null;
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
        ]);
    }

    public function attributeLabels()
    {
        return
            ArrayHelper::merge(
                parent::attributeLabels(),
                [
                ]);
    }


    public static function getEditFields()
    {
        $labels = self::attributeLabels();

        return [
            [
                'slug' => 'user_id',
                'label' => $labels['user_id'],
                'type' => 'integer'
            ],
            [
                'slug' => 'models_classname_id',
                'label' => $labels['models_classname_id'],
                'type' => 'integer'
            ],
            [
                'slug' => 'record_id',
                'label' => $labels['record_id'],
                'type' => 'integer'
            ],
            [
                'slug' => 'email',
                'label' => $labels['email'],
                'type' => 'integer'
            ],
            [
                'slug' => 'sms',
                'label' => $labels['sms'],
                'type' => 'integer'
            ],
            [
                'slug' => 'notifications_enabled',
                'label' => $labels['notifications_enabled'],
                'type' => 'integer'
            ],
            [
                'slug' => 'notify_content_pubblication',
                'label' => $labels['notify_content_pubblication'],
                'type' => 'integer'
            ],
            [
                'slug' => 'notify_comments',
                'label' => $labels['notify_comments'],
                'type' => 'integer'
            ],
        ];
    }

    /**
     * @return string marker path
     */
    public function getIconMarker()
    {
        return null; //TODO
    }

    /**
     * If events are more than one, set 'array' => true in the calendarView in the index.
     * @return array events
     */
    public function getEvents()
    {
        return NULL; //TODO
    }

    /**
     * @return url event (calendar of activities)
     */
    public function getUrlEvent()
    {
        return NULL; //TODO e.g. Yii::$app->urlManager->createUrl([]);
    }

    /**
     * @return color event
     */
    public function getColorEvent()
    {
        return NULL; //TODO
    }

    /**
     * @return title event
     */
    public function getTitleEvent()
    {
        return NULL; //TODO
    }


}