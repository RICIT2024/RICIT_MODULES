<?php

namespace  ricit\humhub\modules\actividades;

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
        if ($event->sender->user !== null && $event->sender->user->moduleManager->isEnabled('actividades')) {
            $event->sender->addItem([
                'label' => Yii::t('ActividadesModule.base', 'Actividades Complementarias'), //cambiar nombre del módulo
                'url' => $event->sender->user->createUrl('/actividades/user'),
                'icon' => '<i class="fa fa-list-alt"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'actividades')
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
                'label' => Yii::t('ActividadesModule.base', 'Actividades Complementarias'), //cambiar nombre del módulo
                'url' => Url::to(['/actividades/actividades']),
                'icon' => '<i class="fa fa-list-alt"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'actividades' && Yii::$app->controller->id == 'actividades'),
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
            'label' => 'Actividades Complementarias',
            'url' => Url::to(['/actividades/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-list-alt"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'actividades' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
