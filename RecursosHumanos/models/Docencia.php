<?php

namespace ricit\humhub\modules\RecursosHumanos\models;

use Yii;
use yii\db\ActiveRecord;

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
class Docencia extends ActiveRecord
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
            'Docencia_id' => 'ID Docencia ',
            'User_id' => 'Usuario',
            'Dependencia' => 'Dependencia',
            'Nivel_impartido' => 'Nivel Impartido',
            'Nombre_programa' => 'Programa',
            'Pais' => 'País',
            'Estado' => 'Estado',
            'Nombre_asignatura' => 'Asignatura',
            'Periodo' => 'Periodo',
        ];
    }

    /**
     * Convierte ciertos atributos a mayúsculas antes de guardar.
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Convertir los atributos de texto a mayúsculas antes de guardar
            $this->Dependencia = strtoupper($this->Dependencia);
            $this->Nivel_impartido = strtoupper($this->Nivel_impartido);
            $this->Nombre_programa = strtoupper($this->Nombre_programa);
            $this->Pais = strtoupper($this->Pais);
            $this->Estado = strtoupper($this->Estado);
            $this->Nombre_asignatura = strtoupper($this->Nombre_asignatura);

            return true;
        } else {
            return false;
        }
    }
}
