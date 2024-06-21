<?php

namespace  ricit\humhub\modules\premios;

use Yii;
use yii\helpers\Url;

class Events
{
     /**
     * Define que realizar cuando el perfil de usuario este inicializado
     *
     * @param $event
     */
    public static function onProfileMenuInit($event)
    {
        if ($event->sender->user !== null && $event->sender->user->moduleManager->isEnabled('premios')) {
            $event->sender->addItem([
                'label' => Yii::t('PremiosModule.base', 'Premios y Reconocimientos'), //cambiar nombre del módulo
                'url' => $event->sender->user->createUrl('/premios/user'),
                'icon' => '<i class="fa fa-trophy"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'premios')
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
                'label' => Yii::t('PremiosModule.base', 'Premios y Reconicimientos'),
                'url' => Url::to(['/premios/premios']),
                'icon' => '<i class="fa fa-trophy"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'premios' && Yii::$app->controller->id == 'premios'),
                'sortOrder' => 130,
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
            'label' => 'Premios y Reconocimientos',
            'url' => Url::to(['/premios/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-trophy"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'premios' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
