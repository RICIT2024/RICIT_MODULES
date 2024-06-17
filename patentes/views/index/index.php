<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\patentes\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('PatentesModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("patentes", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('PatentesModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Patentes</strong> <?= Yii::t('PatentesModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('PatentesModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('PatentesModule.base', 'Say Hello!'))->action("patentes.hello")->loader(false); ?></div>
