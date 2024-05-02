<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchD $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="docencia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Docencia_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'Dependencia') ?>

    <?= $form->field($model, 'Nivel_impartido') ?>

    <?= $form->field($model, 'Nombre_programa') ?>

    <?php // echo $form->field($model, 'Pais') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <?php // echo $form->field($model, 'Nombre_asignatura') ?>

    <?php // echo $form->field($model, 'Periodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
