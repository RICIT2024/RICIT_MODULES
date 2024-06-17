<?php

namespace  ricit\humhub\modules\patentes;

use Yii;
use yii\helpers\Url;

class Events
{
    /**
     * Defines what to do when the top menu is initialized.
     *
     * @param $event
     */
    public static function onProfileMenuInit($event)
    {
        if ($event->sender->user !== null && $event->sender->user->moduleManager->isEnabled('patentes')) {
        $event->sender->addItem([
            'label' => Yii::t('PatentesModule.base', 'Producción tecnológica'),
            'url' => $event->sender->user->createUrl('/patentes/user'),
            'icon' => '<i class="fa fa-file"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'patentes'),
        ]);
        }   
    }

    /**
     * Define que realizar cuando la cuenta del usuario este inicializado
     *
     * @param $event
     */
    public static function onAccountMenuInit($event)
    {
            $event->sender->addItem([
                'label' => Yii::t('PatentesModule.base', 'Producción tecnológica'),
                'url' => Url::to(['/patentes/patentes']),
                'icon' => '<i class="fa fa-file"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'patentes' && Yii::$app->controller->id == 'patentes'),
                'sortOrder' => 135,
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
            'label' => 'Producción tecnológica',
            'url' => Url::to(['/patentes/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-file"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'patentes' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
