<?php

namespace  ricit\humhub\modules\RecursosHumanos;

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
        if ($event->sender->user !== null && $event->sender->user->moduleManager->isEnabled('Estancias')) {
            $event->sender->addItem([
                'label' => Yii::t('RecursosHumanosModule.base', 'Formación de Recursos Humanos'),
                'url' => $event->sender->user->createUrl('/RecursosHumanos/user'),
                'icon' => '<i class="fa fa-graduation-cap"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'RecursosHumanos')
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
                'label' => Yii::t('RecursosHumanosModule.base', 'Formación de Recursos Humanos'),
                'url' => Url::to(['/RecursosHumanos/docencia']),
                'icon' => '<i class="fa fa-graduation-cap"></i>',
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
            'label' => ' Formación de Recursos Humanos',
            'url' => Url::to(['/RecursosHumanos/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-graduation-cap"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'RecursosHumanos' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
