<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Ponencias $model */

$this->title = $model->Ponencia_id;
$type = "Ponencias";
$action ="View";
$folder ="ponencias";

\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">

    <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
        <?= Html::encode($this->title) ?>
    </h1>

    <span style="margin:5px;">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'Ponencia_id',
                'User_id',
                'Tipo',
                'Participación',
                'Autor',
                'Anio',
                'País',
                'Titulo_evento',
                'Titulo_ponencia',
                'Resumen',
                'Memoria',
                'Publicación',
            ],
        ]) ?>
    </span>
</div>
