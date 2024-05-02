<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SearchEI $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estancias-investigacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Estancia_id') ?>

    <?= $form->field($model, 'User_id') ?>

    <?= $form->field($model, 'Institucion') ?>

    <?= $form->field($model, 'Pais') ?>

    <?= $form->field($model, 'Periodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
