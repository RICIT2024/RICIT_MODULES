<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\Estancias\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('EstanciasModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("Estancias", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('EstanciasModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Estancias</strong> <?= Yii::t('EstanciasModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('EstanciasModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('EstanciasModule.base', 'Say Hello!'))->action("Estancias.hello")->loader(false); ?></div>
