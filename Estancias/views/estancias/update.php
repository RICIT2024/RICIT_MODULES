<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\EstanciasInvestigacion $model */

$this->title = 'Update Estancias Investigacion: ' . $model->Estancia_id;
$type = "Estancia";
$action ="Update";
$folder ="estancias";
?>
<div class="estancias-investigacion-update">

    <?= $this->render('@Estancias/views/layouts/nav', [
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
