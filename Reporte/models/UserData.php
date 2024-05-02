<?php

namespace humhub\modules\Reporte\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use humhub\modules\user\models;

/**
 * Extentiende el uso de la tabla user
 */
class UserData extends user
{
    
    


    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

}
