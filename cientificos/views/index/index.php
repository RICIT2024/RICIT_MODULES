<?php

use humhub\widgets\Button;

// Register our module assets, this could also be done within the controller
\ricit\humhub\modules\cientificos\assets\Assets::register($this);

$displayName = (Yii::$app->user->isGuest) ? Yii::t('CientificosModule.base', 'Guest') : Yii::$app->user->getIdentity()->displayName;

// Add some configuration to our js module
$this->registerJsConfig("Eventos Científicos", [
    'username' => (Yii::$app->user->isGuest) ? $displayName : Yii::$app->user->getIdentity()->username,
    'text' => [
        'hello' => Yii::t('CientificosModule.base', 'Hi there {name}!', ["name" => $displayName])
    ]
])

?>

<div class="panel-heading"><strong>Eventos Científicos</strong> <?= Yii::t('CientificosModule.base', 'overview') ?></div>

<div class="panel-body">
    <p><?= Yii::t('CientificosModule.base', 'Hello World!') ?></p>

    <?=  Button::primary(Yii::t('CientificosModule.base', 'Say Hello!'))->action("Certifi.hello")->loader(false); ?></div>
