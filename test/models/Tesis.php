<?php

namespace ricit\humhub\modules\test\models;

use Yii;

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
            'Tesis_id' => 'TESIS ID',
            'User_id' => 'USER ID',
            'Autor' => 'AUTOR',
            'Grado_academico' => 'GRADO ACADEMICO',
            'Institucion_procedencia' => 'INSTITUCIÓN PROCEDENCIA',
            'Anio' => 'AÑO',
            'Titulo' => 'TITULO',
            'Pais' => 'PAIS',
        ];
    }
}
