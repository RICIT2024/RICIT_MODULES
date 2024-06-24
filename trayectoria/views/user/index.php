<?php
    use ricit\humhub\modules\trayectoria\models\trayectoria;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\grid\ActionColumn;
    use yii\grid\GridView;
    use yii\db\Query;
    
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('UserModule.profile', '<strong>Experiencia Laboral </strong>') ?>
    </div>

<?php   
   echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' =>[
        [
            'attribute' => 'User_id',
            'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ],
            'value' => function ($model) {
                $profile = (new Query())
                    ->select(['firstname', 'lastname'])
                    ->from('profile')
                    ->where(['user_id' => $model->User_id])
                    ->one();

                return $profile ? $profile['firstname'] . ' ' . $profile['lastname'] : '';
            },
        ],
         [            
            // you may configure additional properties here
            'attribute' => 'sector',
            'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
        ],
        [            
         // you may configure additional properties here
         'attribute' => 'dependencia',
         'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
         ],
         [            
            // you may configure additional properties here
            'attribute' => 'cargo',
            'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
        ],
        
      ],
     ]);

?>
</div>