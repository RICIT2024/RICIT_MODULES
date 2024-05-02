<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchP $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ponencias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'Ponencia_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'Tipo') ?>

    <?= $form->field($model, 'Participación') ?>

    <?= $form->field($model, 'Autor') ?>

    <?= $form->field($model, 'Anio') ?>

    <?php // echo $form->field($model, 'País') ?>

    <?php // echo $form->field($model, 'Titulo_evento') ?>

    <?php // echo $form->field($model, 'Titulo_ponencia') ?>

    <?php // echo $form->field($model, 'Resumen') ?>

    <?php // echo $form->field($model, 'Memoria') ?>

    <?php // echo $form->field($model, 'Publicación') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
