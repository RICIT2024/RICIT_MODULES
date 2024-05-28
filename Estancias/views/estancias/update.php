<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\EstanciasInvestigacion $model */

?>
<div class="estancias-investigacion-update">

    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32; color: #FFFFFF;']) ?>    
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'hum_uid' => $model->User_id,
    ]) ?>

</div>
