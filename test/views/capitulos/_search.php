<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchC $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cap-libros-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Cap_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'Anio') ?>

    <?= $form->field($model, 'Titulo_capitulo') ?>

    <?= $form->field($model, 'Paginas') ?>

    <?php // echo $form->field($model, 'Resumen') ?>

    <?php // echo $form->field($model, 'Autor_libro') ?>

    <?php // echo $form->field($model, 'Autores_capitulo') ?>

    <?php // echo $form->field($model, 'Titulo_libro') ?>

    <?php // echo $form->field($model, 'Editores') ?>

    <?php // echo $form->field($model, 'ISBN') ?>

    <?php // echo $form->field($model, 'URL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
