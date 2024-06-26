<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use ricit\humhub\modules\test\models\Articulos;
use yii\db\Query;

/** @var yii\web\View $this */
/** @var ricit\models\SearchA $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// Register the external JavaScript file
$this->title = 'Artículos';
?>

<div class="articulos-index">
    <div class="container-fluid">
        <?= $this->render('@test/views/layouts/nav-header', []) ?>

        <h1 style="margin-top:10px; font-weight:bold; font-size:20px; width:auto; text-align:center;">
            <?= Html::encode($this->title) ?>
        </h1>
        
        <p>
            <?= Html::a('Registrar', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'User_id',
                    'value' => function ($model) {
                        $profile = (new Query())
                            ->select(['firstname', 'lastname'])
                            ->from('profile')
                            ->where(['user_id' => $model->User_id])
                            ->one();
    
                        return $profile ? $profile['firstname'] . ' ' . $profile['lastname'] : '';
                    },
                ],
                'Autor',
                'Autores',
                'Anio',
                'Titulo',
                
                //'Resumen',
                    //'Revista',
                    //'Pais',
                    //'Idioma',
                    //'ISSNs',
                    //'URL:url',
                    //'DOI',
                    //'Palabras_clave',
                // Add other columns with centered headers as needed
                [
                    'class' => ActionColumn::class,
                    'urlCreator' => function ($action, Articulos $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'Articulos_id' => $model->Articulos_id]);
                    }
                    ],
                ],
            ]); ?>      
    </div>
</div>
