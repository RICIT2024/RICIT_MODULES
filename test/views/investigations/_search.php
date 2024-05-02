<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchSP $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="libros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Libro_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'Autor') ?>

    <?= $form->field($model, 'Autores_sec') ?>

    <?= $form->field($model, 'Anio') ?>

    <?php // echo $form->field($model, 'Titulo') ?>

    <?php // echo $form->field($model, 'Resumen') ?>

    <?php // echo $form->field($model, 'Editorial') ?>

    <?php // echo $form->field($model, 'ISBN') ?>

    <?php // echo $form->field($model, 'Formato') ?>

    <?php // echo $form->field($model, 'DOI') ?>

    <?php // echo $form->field($model, 'URL') ?>

    <?php // echo $form->field($model, 'Palabras_clave') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
