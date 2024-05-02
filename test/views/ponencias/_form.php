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
                <?= $form->field($model, 'Tipo')->dropDownList($model->getTipoOptions(), ['prompt' => 'Select Tipo'] ) ?>

                <?= $form->field($model, 'Participación')->dropDownList($model->getParticipacionOptions(), ['prompt' => 'Select Tipo'] )?>

                <?= $form->field($model, 'Autor')->textInput(['onchange' => 'this.value = this.value.toUpperCase();'],['maxlength' => true, 'value'=>$name]) ?>

                <?= $form->field($model, 'Anio')->textInput() ?>

                <?= $form->field($model, 'País')->textInput(['onchange' => 'this.value = this.value.toUpperCase();'],['maxlength' => true]) ?>
            </span>

            <span class="col-md-6">
                <?= $form->field($model, 'Titulo_evento')->textInput(['onchange' => 'this.value = this.value.toUpperCase();'],['maxlength' => true]) ?>

                <?= $form->field($model, 'Titulo_ponencia')->textInput(['onchange' => 'this.value = this.value.toUpperCase();'],['maxlength' => true]) ?>

                <?= $form->field($model, 'Resumen')->textInput(['onchange' => 'this.value = this.value.toUpperCase();'],['maxlength' => true]) ?>

                <?= $form->field($model, 'Memoria')->dropDownList($model->getMemoriaOptions(), ['prompt' => 'Select Tipo'] ) ?>

                <?= $form->field($model, 'Publicación')->textInput(['onchange' => 'this.value = this.value.toUpperCase();'],['maxlength' => true]) ?>
            </span>
        </row>
    </div>

    <div class="form-group" style="margin-left: 10px; padding-bottom:10px;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
