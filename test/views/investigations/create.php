<?php

use yii\helpers\Url;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Libros $model */
$hum_uid=Yii::$app->user->getId();    

?>
<div class="libros-create">

    <p>
        <?= Html::a('<i class="fa fa-arrow-left" style="color: #FFFFFF;"></i>', ['index'], ['class' => 'btn btn-default', 'style' => 'background-color: #691C32; color: #FFFFFF;']) ?>    
    </p>
    
    <?= $this->render('_form', [
        'model' => $model,
        'hum_uid' => $hum_uid
    ]) ?>

</div>
