<?php

namespace  ricit\humhub\modules\metrica;

use Yii;
use yii\helpers\Url;

class Events
{
    /**
     * Defines what to do if admin menu is initialized.
     *
     * @param $event
     */
    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem([
            'label' => 'Demografía RICIT',
            'url' => Url::to(['/metrica/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-area-chart"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'metrica' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
