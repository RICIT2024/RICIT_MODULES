<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ponencias $model */
$hum_uid=Yii::$app->user->getId();    
$name=Yii::$app->user->getIdentity()->displayName;

$this->title = 'Create Ponencias';
$type = "Ponencia";
$action ="Crear";
$folder ="ponencias";
?>
<div class="ponencias-create">

    <?= $this->render('@test/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="padding-top:10px; margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
        'hum_uid' =>$hum_uid,
        'name' =>$name,

    ]) ?>

</div>
