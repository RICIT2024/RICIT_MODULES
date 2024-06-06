<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\certifi\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('CertifiModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("Certificaciones", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('CertifiModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Certificaciones</strong> <?= Yii::t('CertifiModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('CertifiModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('CertifiModule.base', 'Say Hello!'))->action("Certifi.hello")->loader(false); ?></div>
