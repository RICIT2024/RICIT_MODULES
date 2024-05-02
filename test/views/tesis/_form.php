<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tesis $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tesis-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">
        <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>

        <div class="row">
            <span class="col-md-6 col-sm-6">
                <?= $form->field($model, 'Autor')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Grado_academico')->dropDownList($model->getOptions(), ['prompt' => 'Select Tipo'] ) ?>

                <?= $form->field($model, 'Institucion_procedencia')->textInput(['maxlength' => true]) ?>
            </span>

            <span class="col-md-6 col-sm-6">
                <?= $form->field($model, 'Anio')->textInput() ?>

                <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Pais')->textInput(['maxlength' => true]) ?>
            </span>
        </div>
    
    </div>


    <div class="form-group" style="margin-left: 10px; padding-bottom:10px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
