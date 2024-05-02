<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\EstanciasInvestigacion $model */

$this->title = $model->Estancia_id;
$type = "Estancia";
$action ="View";
$folder ="estancias";

\yii\web\YiiAsset::register($this);
?>
<div class="estancias-investigacion-view">

    <?= $this->render('@Estancias/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>

    <p>
        <?= Html::a('Update', ['update', 'Estancia_id' => $model->Estancia_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Estancia_id' => $model->Estancia_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Estancia_id',
            'User_id',
            'Institucion',
            'Pais',
            'Periodo',
        ],
    ]) ?>

</div>
