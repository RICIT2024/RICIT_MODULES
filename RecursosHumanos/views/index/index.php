<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\RecursosHumanos\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('RecursosHumanosModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("Formación de Recursos Humanos", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('RecursosHumanosModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Eventos Científicos</strong> <?= Yii::t('RecursosHumanosModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('RecursosHumanosModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('RecursosHumanosModule.base', 'Say Hello!'))->action("Docencia.hello")->loader(false); ?></div>
