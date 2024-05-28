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
    <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>

        <?= $form->field($model, 'Nombre_cert')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Institución')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Vigencia')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
