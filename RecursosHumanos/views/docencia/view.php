<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Docencia $model */

$this->title = $model->Docencia_id;
$type = "Docencia";
$action ="View";
$folder ="docencia";

\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">
    <?= $this->render('@Estancias/views/layouts/nav', [
        'type' => $type,
        'action' => $action,
        'folder'=> $folder,
    ]) ?>

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>
    <p>
        <?= Html::a('Update', ['update', 'Docencia_id' => $model->Docencia_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Docencia_id' => $model->Docencia_id], [
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
            'Docencia_id',
            'User_id',
            'Dependencia',
            'Nivel_impartido',
            'Nombre_programa',
            'Pais',
            'Estado',
            'Nombre_asignatura',
            'Periodo',
        ],
    ]) ?>

</div>
