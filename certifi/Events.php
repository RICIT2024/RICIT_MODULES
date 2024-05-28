<?php

namespace  ricit\humhub\modules\certifi;

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
        if ($event->sender->user !== null && $event->sender->user->moduleManager->isEnabled('certifi')) {
            $event->sender->addItem([
                'label' => Yii::t('CertifiModule.base', 'certificaciones'), //cambiar nombre del módulo
                'url' => $event->sender->user->createUrl('/certifi/user'),
                'icon' => '<i class="fa fa-check-circle"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'certifi')
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
                'label' => Yii::t('CertifiModule.base', 'Certificaciones'), //cambiar nombre del módulo
                'url' => Url::to(['/certifi/certifi']),
                'icon' => '<i class="fa fa-check-circle"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'certifi' && Yii::$app->controller->id == 'certifi'),
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
            'label' => 'Certificaciones', //cambiar nombre del módulo
            'url' => Url::to(['/certifi/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-check-circle"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'certifi' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
