<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchT $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tesis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Tesis_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'Autor') ?>

    <?= $form->field($model, 'Grado_academico') ?>

    <?= $form->field($model, 'Institucion_procedencia') ?>

    <?php // echo $form->field($model, 'Anio') ?>

    <?php // echo $form->field($model, 'Titulo') ?>

    <?php // echo $form->field($model, 'Pais') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
