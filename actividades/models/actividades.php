<?php

namespace  ricit\humhub\modules\actividades\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "actividades_complementarias".
 *
 * @property int $Actividades_id
 * @property int $User_id
 * @property string $Dependencia
 * @property int $Anio_ingreso
 * @property string $Fecha
 * @property string $URL
 */
class actividades extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actividades_complementarias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'Dependencia', 'Anio_ingreso', 'Fecha', 'URL'], 'required'],
            [['User_id', 'Anio_ingreso'], 'integer'],
            [['Fecha'], 'safe'],
            [['Dependencia', 'URL'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Actividades_id' => 'ID Actividades',
            'User_id' => 'Usuario',
            'Dependencia' => 'Dependencia',
            'Anio_ingreso' => 'Año Ingreso',
            'Fecha' => 'Fecha',
            'URL' => 'URL',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(actividades::class, ['User_id' => 'User_id']);
    }
}
