<?php

namespace ricit\humhub\modules\RecursosHumanos;

use Yii;
use yii\helpers\Url;
use humhub\modules\user\models\User;
use humhub\modules\content\components\ContentContainerModule;
use humhub\modules\content\components\ContentContainerActiveRecord;

class Module extends ContentContainerModule
{
    /**
    * @inheritdoc
    */
    public function getContentContainerTypes()
    {
        return [
            User::class
        ];
    }

    /**
    * @inheritdoc
    */
    public function getConfigUrl()
    {
        return Url::to(['/RecursosHumanos/admin']);
    }

    /**
    * @inheritdoc
    */
    public function disable()
    {
        // Cleanup all module data, don't remove the parent::disable()!!!
        parent::disable();
    }

    /**
    * @inheritdoc
    */
    public function disableContentContainer(ContentContainerActiveRecord $container)
    {
        // Clean up space related data, don't remove the parent::disable()!!!
        parent::disableContentContainer($container);
    }

    /**
    * @inheritdoc
    */
    public function getContentContainerName(ContentContainerActiveRecord $container)
    {
        return Yii::t('RecursosHumanosModule.base', 'Formacion de RH');
    }

    /**
    * @inheritdoc
    */
    public function getContentContainerDescription(ContentContainerActiveRecord $container)
    {
        return Yii::t('RecursosHumanosModule.base', 'Registro de las instancias de Docencia y Tesis dirigidas del Usuario');
    }
}
