<?php

namespace  ricit\humhub\modules\software;

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
        if ($event->sender->user !== null && $event->sender->user->moduleManager->isEnabled('software')) {
            $event->sender->addItem([
                'label' => Yii::t('SoftwareModule.base', 'Desarrollo de Software'), //cambiar nombre del módulo
                'url' => $event->sender->user->createUrl('/software/user'),
                'icon' => '<i class="fa fa-laptop"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'software')
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
                'label' => Yii::t('SoftwareModule.base', 'Desarrollo de software'), //cambiar nombre del módulo
                'url' => Url::to(['/software/software']),
                'icon' => '<i class="fa fa-laptop"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'software' && Yii::$app->controller->id == 'software'),
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
            'label' => 'Desarrollo de Software',
            'url' => Url::to(['/software/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-laptop"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'software' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
