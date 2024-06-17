<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\software\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('SoftwareModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("software", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('SoftwareModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Software</strong> <?= Yii::t('SoftwareModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('SoftwareModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('SoftwareModule.base', 'Say Hello!'))->action("software.hello")->loader(false); ?></div>
