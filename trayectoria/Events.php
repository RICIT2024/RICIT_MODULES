<?php

namespace  ricit\humhub\modules\trayectoria;

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
        if ($event->sender->user !== null && $event->sender->user->moduleManager->isEnabled('trayectoria')) {
            $event->sender->addItem([
                'label' => Yii::t('TrayectoriaModule.base', 'Experiencia Laboral'),
                'url' => $event->sender->user->createUrl('/trayectoria/user'),
                'icon' => '<i class="fa fa-briefcase"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'trayectoria')
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
                'label' => Yii::t('TrayectoriaModule.base', 'Experiencia Laboral'),
                'url' => Url::to(['/trayectoria/trayectoria']),
                'icon' => '<i class="fa fa-briefcase"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'RecursosHumanos' && Yii::$app->controller->id == 'docencia'),
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
            'label' => 'Experiencia Laboral',
            'url' => Url::to(['/trayectoria/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-briefcase"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'trayectoria' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
