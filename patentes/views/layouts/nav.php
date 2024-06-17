<?php

use yii\helpers\Url;
use yii\helpers\Html;

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= Html::a($type, Url::to([$folder . '/index']))?></li>
        <li class="breadcrumb-item active" aria-current="page"><?= Html::encode($action) ?></li>
    </ol>
    </nav>