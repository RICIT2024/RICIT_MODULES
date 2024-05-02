<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Docencia $model */

$this->title = 'Update Docencia: ' . $model->Docencia_id;
$type = "Docencia";
$action ="Update";
$folder ="docencia";
?>
<div class="docencia-update">

    <?= $this->render('@RecursosHumanos/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    <?= $this->render('_form', [
        'model' => $model,
        'hum_uid' => $model->User_id,
    ]) ?>

</div>
