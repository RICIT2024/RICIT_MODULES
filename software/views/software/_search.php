<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchS $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="software-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Software_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'autor') ?>

    <?= $form->field($model, 'anio_publicacion') ?>

    <?= $form->field($model, 'titulo') ?>

    <?php // echo $form->field($model, 'sistema') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'disponible') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
