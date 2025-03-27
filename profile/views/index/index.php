<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\profile\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('ProfileModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("profile", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('ProfileModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Profile</strong> <?= Yii::t('ProfileModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('ProfileModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('ProfileModule.base', 'Say Hello!'))->action("profile.hello")->loader(false); ?></div>
