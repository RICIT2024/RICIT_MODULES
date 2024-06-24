<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\trayectoria $model */

$hum_uid=Yii::$app->user->getId(); 

?>
<div class="trayectoria-create">

    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32; color: #FFFFFF;']) ?>    
    </p><br>


    <?= $this->render('_form', [
        'model' => $model,
        'hum_uid' => $hum_uid,

    ]) ?>

</div>
