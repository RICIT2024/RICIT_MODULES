<?php

namespace  ricit\humhub\modules\test;

use Yii;
use yii\helpers\Url;
use humhub\modules\user\models\User;


class Events
{
    /**
     * Defines what to do when the top menu is initialized.
     *
     * @param $event
     */
    public static function onTopMenuInit($event)
    {
        $event->sender->addItem([
            'label' => 'Motor de Búsqueda',
            'icon' => '<i class="fa fa-book"></i>',
            'url' => Url::to(['/test/index']),
            'sortOrder' => 99999,
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'test' && Yii::$app->controller->id == 'index'),
        ]);
    }

    /**
     * Define que realizar cuando el perfil de usuario este inicializado
     *
     * @param $event
     */
    public static function onProfileMenuInit($event)
    {
        if ($event->sender->user !== null && $event->sender->user->moduleManager->isEnabled('test')) {
            $event->sender->addItem([
                'label' => Yii::t('TestModule.base', 'Producción Científica'),
                'url' => $event->sender->user->createUrl('/test/user'),
                'icon' => '<i class="fa fa-book"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'test')
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
                'label' => Yii::t('TestModule.base', 'Producción Científica'),
                'url' => Url::to(['/test/articulos']),
                'icon' => '<i class="fa fa-book"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'test' && Yii::$app->controller->id == 'articulos'),
                'sortOrder' => 125,
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
            'label' => 'Producción Científica',
            'url' => Url::to(['/test/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-book"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'test' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
