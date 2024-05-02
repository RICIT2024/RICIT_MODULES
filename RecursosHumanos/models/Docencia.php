<?php

namespace ricit\humhub\modules\RecursosHumanos\models;

use Yii;

/**
 * This is the model class for table "docencia".
 *
 * @property int $Docencia_id
 * @property int $User_id
 * @property string $Dependencia
 * @property string $Nivel_impartido
 * @property string $Nombre_programa
 * @property string $Pais
 * @property string $Estado
 * @property string $Nombre_asignatura
 * @property string $Periodo
 */
class Docencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'docencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'Dependencia', 'Nivel_impartido', 'Nombre_programa', 'Pais', 'Estado', 'Nombre_asignatura', 'Periodo'], 'required'],
            [['User_id'], 'integer'],
            [['Dependencia', 'Nivel_impartido', 'Nombre_programa', 'Pais', 'Estado', 'Nombre_asignatura'], 'string', 'max' => 255],
            [['Periodo'], 'string', 'max' => 20],
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
            'Docencia_id' => 'Docencia ID',
            'User_id' => 'User ID',
            'Dependencia' => 'Dependencia',
            'Nivel_impartido' => 'Nivel Impartido',
            'Nombre_programa' => 'Nombre Programa',
            'Pais' => 'Pais',
            'Estado' => 'Estado',
            'Nombre_asignatura' => 'Nombre Asignatura',
            'Periodo' => 'Periodo',
        ];
    }
}
