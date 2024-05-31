<?php

namespace  ricit\humhub\modules\cientificos;

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
        if ($event->sender->user !== null && $event->sender->user->moduleManager->isEnabled('cientificos')) {
            $event->sender->addItem([
                'label' => Yii::t('CientificosModule.base', 'Eventos Científicos'), //cambiar nombre del módulo
                'url' => $event->sender->user->createUrl('/cientificos/user'),
                'icon' => '<i class="fa fa-flask"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'cientificos')
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
                'label' => Yii::t('CientificosModule.base', 'Eventos Científicos'), //cambiar nombre del módulo
                'url' => Url::to(['/cientificos/cientificos']),
                'icon' => '<i class="fa fa-flask"></i>',
                'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'cientificos' && Yii::$app->controller->id == 'cientificos'),
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
            'label' => 'Eventos Científicos',
            'url' => Url::to(['/cientificos/admin']),
            'group' => 'manage',
            'icon' => '<i class="fa fa-flask"></i>',
            'isActive' => (Yii::$app->controller->module && Yii::$app->controller->module->id == 'cientificos' && Yii::$app->controller->id == 'admin'),
            'sortOrder' => 99999,
        ]);
    }
}
