<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tesis $model */

$this->title = 'Update Tesis: ' . $model->Tesis_id;

$type = "Tesis";
$action ="Update";
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
        'hum_uid' => $model->User_id,
    ]) ?>

</div>
