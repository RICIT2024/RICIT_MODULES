<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\grid\GridView;    
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('UserModule.profile', '<strong>Estancias</strong> By User') ?>
    </div>

<?php   
   echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' =>[
         [            
            // you may configure additional properties here
            'attribute' => 'Institucion',
            'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
        ],
        [            
         // you may configure additional properties here
         'attribute' => 'Pais',
         'headerOptions'=>[ 'style'=>'background-color:#BC955C; text-align: center;' ]
         ],
         [            
            // you may configure additional properties here
            'attribute' => 'Periodo',
            'headerOptions'=>[ 'style'=>'background-color:#BC955C; width:10%; text-align: center;' ]
            ]
      ],
     ]);

?>
</div>