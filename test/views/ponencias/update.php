<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ponencias $model */

$this->title = 'Update Ponencias: ' . $model->Ponencia_id;
$type = "Ponencias";
$action ="Update";
$folder ="ponencias";
?>
<div class="ponencias-update">

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
        'hum_uid' => $model->User_id,
        'name'=> $model->Autor
    ]) ?>

</div>
