<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Docencia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="docencia-form"> 

    <?php $form = ActiveForm::begin(); ?>
        
    <div class="container-fluid">
        <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>

        <div class="row">
            <span class="col-md-6 col-sm-6">
                <?= $form->field($model, 'Dependencia')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Nivel_impartido')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Nombre_programa')->textInput(['maxlength' => true]) ?>

            </span>

            <span class="col-md-6 col-sm-6">
                <?= $form->field($model, 'Pais')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Nombre_asignatura')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'Periodo')->textInput(['maxlength' => true]) ?>
            </span>
        </div>
    
    </div>
    
    <div class="form-group" style="margin-left: 10px; padding-bottom:10px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
