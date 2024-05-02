<?php

namespace  ricit\humhub\modules\usermessage;

use Yii;
use yii\helpers\Url;

class Events
{
    /**
     * Defines what to do when the top menu is initialized.
     *
     * @param $event
     */
    public static function onTopMenuInit($event)
    {
        $event->sender->addItem([
            'label' => 'Contacto',
            'icon' => '<i class="fa fa-comment"></i>',
            'url' => Url::to(['/usermessage/index']),
            'sortOrder' => 1000,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'usermessage' && Yii::$app->controller->id == 'index'),
        ]);
    }

    /**
     * Defines what to do if admin menu is initialized.
     *
     * @param $event
     */
    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem([
            'label' => 'Contacto',
            'url' => Url::to(['/usermessage/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-comment"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'usermessage' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 1000,
        ]);
    }
}
