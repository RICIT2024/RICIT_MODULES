<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\actividades\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('ActividadesModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("Actividades Complementarias", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('ActividadesModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Certificaciones</strong> <?= Yii::t('ActividadesModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('ActividadesModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('ActividadesModule.base', 'Say Hello!'))->action("Actividades.hello")->loader(false); ?></div>
