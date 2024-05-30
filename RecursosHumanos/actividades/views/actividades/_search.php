<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchA $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="actividades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Actividades_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'Dependencia') ?>

    <?= $form->field($model, 'Anio_ingreso') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?php // echo $form->field($model, 'URL') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
