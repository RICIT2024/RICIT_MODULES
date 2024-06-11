<?php

namespace ricit\humhub\modules\test\models;

use Yii;
use \yii\db\ActiveRecord;


/**
 * This is the model class for table "tesis".
 *
 * @property int $Tesis_id
 * @property int $User_id
 * @property string $Autor
 * @property string|null $Grado_academico
 * @property string $Institucion_procedencia
 * @property int $Anio
 * @property string $Titulo
 * @property string $Pais
 */
class Tesis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tesis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'Autor', 'Institucion_procedencia', 'Anio', 'Titulo', 'Pais'], 'required'],
            [['User_id', 'Anio'], 'integer'],
            [['Autor', 'Grado_academico', 'Institucion_procedencia', 'Titulo', 'Pais'], 'string', 'max' => 255],
        ];
    }

         // Define un metodo para retornar las opciones para Tipo
         public static function getOptions()
         {
             return [
                 'Licenciatura' => 'Licenciatura',
                 'Maestría' => 'Maestría',
                 'Doctorado' => 'Doctorado',
                 // Add more options as needed
             ];
         }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Tesis_id' => 'ID Tesis',
            'User_id' => 'Usuario',
            'Autor' => 'Autor',
            'Grado_academico' => 'Grado Académico',
            'Institucion_procedencia' => 'Institución de procedencia',
            'Anio' => 'Año',
            'Titulo' => 'Título',
            'Pais' => 'País',
        ];
    }

    /**
     * Convierte ciertos atributos a mayúsculas antes de guardar.
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Convertir los atributos de texto a mayúsculas antes de guardar
            $this->Autor = strtoupper($this->Autor);
            $this->Grado_academico = strtoupper($this->Grado_academico);
            $this->Institucion_procedencia = strtoupper($this->Institucion_procedencia);
            $this->Titulo = strtoupper($this->Titulo);
            $this->Pais = strtoupper($this->Pais);
            return true;
        } else {
            return false;
        }
    }
}
