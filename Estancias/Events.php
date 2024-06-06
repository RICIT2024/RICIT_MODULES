<?php

namespace  ricit\humhub\modules\Estancias;

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
                'label' => Yii::t('EstanciasModule.base', 'Estancias de Investigación'), //cambiar nombre del módulo
                'url' => $event->sender->user->createUrl('/Estancias/user'),
                'icon' => '<i class="fa fa-university"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'Estancias')
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
                'label' => Yii::t('EstanciasModule.base', 'Estancias de Investigación'),
                'url' => Url::to(['/Estancias/estancias']),
                'icon' => '<i class="fa fa-university"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'Estancias' && Yii::$app->controller->id == 'estancias'),
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
            'label' => 'Estancias de Investigación',
            'url' => Url::to(['/Estancias/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-university"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'Estancias' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
