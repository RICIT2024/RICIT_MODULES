<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tesis $model */

$this->title = 'Registrar Tesis';
$hum_uid=Yii::$app->user->getId(); 

$type = "Tesis";
$action ="Registrar";
$folder ="tesis";

?>
<div class="container-fluid">
    <?= $this->render('@test/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
        'hum_uid' => $hum_uid,
        
    ]) ?>

</div>
