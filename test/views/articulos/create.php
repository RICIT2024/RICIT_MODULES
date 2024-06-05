<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Articulos $model */

$hum_uid=Yii::$app->user->getId();    

?>
<div class="articulos-create">
    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32; color: #FFFFFF;']) ?>    
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'hum_uid' => $hum_uid
    ]) ?>

</div>
