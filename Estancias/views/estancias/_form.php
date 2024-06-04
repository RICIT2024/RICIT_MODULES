<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EstanciasInvestigacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estancias-investigacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
    <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>

        <?= $form->field($model, 'Institucion')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

        <?= $form->field($model, 'Pais')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

        <?= $form->field($model, 'Periodo')->textInput([
            'maxlength' => true,
            'placeholder' => 'AAAA-AAAA',
            'pattern' => '\d{4}-\d{4}',
            'title' => 'Debe ser un periodo con el formato AAAA-AAAA'
            ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
