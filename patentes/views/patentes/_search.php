<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchP $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="patentes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Patentes_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'autor') ?>

    <?= $form->field($model, 'titulo_invencion') ?>

    <?= $form->field($model, 'estatus_invencion') ?>

    <?php // echo $form->field($model, 'anio_estatus') ?>

    <?php // echo $form->field($model, 'clasificacion') ?>

    <?php // echo $form->field($model, 'asignatario') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
