<?php

namespace ricit\humhub\modules\trayectoria\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "trayectoria".
 *
 * @property int $Trayectoria_id
 * @property int $User_id
 * @property string $sector
 * @property string $dependencia
 * @property string $pais
 * @property string $estado
 * @property string $cargo
 * @property string $periodo
 */
class trayectoria extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trayectoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'sector', 'dependencia', 'pais', 'estado', 'cargo', 'periodo'], 'required'],
            [['User_id'], 'integer'],
            [['sector', 'dependencia', 'pais', 'estado', 'cargo', 'periodo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Trayectoria_id' => 'ID Trayectoria ',
            'User_id' => 'Usuario',
            'sector' => 'Sector',
            'dependencia' => 'Dependencia',
            'pais' => 'País',
            'estado' => 'Estado',
            'cargo' => 'Cargo',
            'periodo' => 'Periodo',
        ];
    }

     /**
     * Convierte ciertos atributos a mayúsculas antes de guardar.
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Convertir los atributos de texto a mayúsculas antes de guardar
            $this->sector = strtoupper($this->sector);
            $this->dependencia = strtoupper($this->dependencia);
            $this->pais = strtoupper($this->pais);
            $this->estado = strtoupper($this->estado);
            $this->cargo = strtoupper($this->cargo);
            $this->periodo = strtoupper($this->periodo);

            return true;
        } else {
            return false;
        }
    }
}
