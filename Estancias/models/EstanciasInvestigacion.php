<?php

namespace ricit\humhub\modules\Estancias\models;

use Yii;

/**
 * This is the model class for table "estancias_investigacion".
 *
 * @property int $Estancia_id
 * @property int $User_id
 * @property string $Institucion
 * @property string $Pais
 * @property string $Periodo
 */
class EstanciasInvestigacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estancias_investigacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'Institucion', 'Pais', 'Periodo'], 'required'],
            [['User_id'], 'integer'],
            [['Institucion', 'Pais', 'Periodo'], 'string', 'max' => 255],
        ];
    }

    // Define un metodo para retornar el total de registros
    public function getTotal()
    {
        return $this->find()->count();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Estancia_id' => 'Estancia ID',
            'User_id' => 'User ID',
            'Institucion' => 'Institucion',
            'Pais' => 'Pais',
            'Periodo' => 'Periodo',
        ];
    }
}
