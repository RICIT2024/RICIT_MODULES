<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Certifi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="certifi-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
        <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid, 'readonly' => true, 'style' => 'text-transform: uppercase;']) ?>

        <?= $form->field($model, 'Nombre_cert')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

        <?= $form->field($model, 'Institución')->textInput(['maxlength' => true, 'style' => 'text-transform: uppercase;']) ?>

        <?= $form->field($model, 'Vigencia')->textInput([
            'maxlength' => true,
            'style' => 'text-transform: uppercase;',
            'placeholder' => 'AAAA',
            'pattern' => '\d{4}',
            'title' => 'Debe ser un año valido'
        ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
