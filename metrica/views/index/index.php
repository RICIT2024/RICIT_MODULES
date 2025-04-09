<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\metrica\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('MetricaModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("metrica", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('MetricaModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Metrica</strong> <?= Yii::t('MetricaModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('MetricaModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('MetricaModule.base', 'Say Hello!'))->action("metrica.hello")->loader(false); ?></div>
