<?php

namespace  ricit\humhub\modules\profile;

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
            'label' => 'Extracción de datos de perfil',
            'url' => Url::to(['/profile/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-file-excel-o"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'profile' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
