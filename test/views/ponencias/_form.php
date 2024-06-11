<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var ricit\humhub\modules\test\models\Ponencias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ponencias-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="container-fluid">

        <?= $form->field($model, 'User_id')->textInput(['value' => $hum_uid,'readonly' => true]) ?>

        <row>
            <span class="col-md-6">
                <?= $form->field($model, 'Tipo')->dropDownList($model->getTipoOptions(), ['prompt' => 'Selecciona el tipo de ponencia'] ) ?>

                <?= $form->field($model, 'Participación')->dropDownList($model->getParticipacionOptions(), ['prompt' => 'Selecciona el tipo de participación'] )?>

                <?= $form->field($model, 'Autor')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'Anio')->textInput([
                    'maxlength' => true,
                    'placeholder' => 'AAAA ',
                    'pattern' => '\d{4}',
                    'title' => 'Debe ser un año valido'
                ]) ?>

                <?= $form->field($model, 'País')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>
            </span>

            <span class="col-md-6">
                <?= $form->field($model, 'Titulo_evento')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'Titulo_ponencia')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>

                <?= $form->field($model, 'Resumen')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;', 'placeholder' => 'Máximo 255 caracteres']) ?>

                <?= $form->field($model, 'Memoria')->dropDownList($model->getMemoriaOptions(), ['prompt' => 'Selecciona el tipo de memoria'] ) ?>

                <?= $form->field($model, 'Publicación')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase;']) ?>
            </span>
        </row>
    </div>

    <div class="form-group" style="margin-left: 10px; padding-bottom:10px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
