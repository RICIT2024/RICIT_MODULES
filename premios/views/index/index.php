<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\premios\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('PremiosModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("premios", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('PremiosModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Premios</strong> <?= Yii::t('PremiosModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('PremiosModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('PremiosModule.base', 'Say Hello!'))->action("premios.hello")->loader(false); ?></div>
