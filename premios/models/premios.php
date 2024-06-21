<?php

namespace ricit\humhub\modules\premios\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "premios".
 *
 * @property int $Premios_id
 * @property int $User_id
 * @property string $tipo
 * @property string $titulo
 * @property string $descripcion
 * @property string $dependencia
 * @property string $anio
 */
class premios extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'premios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'tipo', 'titulo', 'descripcion', 'dependencia', 'anio'], 'required'],
            [['User_id'], 'integer'],
            [['anio'], 'safe'],
            [['tipo', 'titulo', 'descripcion', 'dependencia'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Premios_id' => 'ID Premios',
            'User_id' => 'Usuario',
            'tipo' => 'Tipo',
            'titulo' => 'Título',
            'descripcion' => 'Descripción',
            'dependencia' => 'Dependencia',
            'anio' => 'Año',
        ];
    }

     /**
     * Convierte ciertos atributos a mayúsculas antes de guardar.
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Convertir los atributos de texto a mayúsculas antes de guardar
            $this->tipo = strtoupper($this->tipo);
            $this->titulo = strtoupper($this->titulo);
            $this->descripcion = strtoupper($this->descripcion);
            $this->dependencia = strtoupper($this->dependencia);
            return true;
        } else {
            return false;
        }
    }
}
