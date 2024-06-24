<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\trayectoria\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('TrayectoriaModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("trayectoria", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('TrayectoriaModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Trayectoria</strong> <?= Yii::t('TrayectoriaModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('TrayectoriaModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('TrayectoriaModule.base', 'Say Hello!'))->action("trayectoria.hello")->loader(false); ?></div>
