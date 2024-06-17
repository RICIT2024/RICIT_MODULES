<?php

namespace ricit\humhub\modules\patentes\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "patentes".
 *
 * @property int $Patentes_id
 * @property int $User_id
 * @property string $autor
 * @property string $titulo_invencion
 * @property string $estatus_invencion
 * @property string $anio_estatus
 * @property string $clasificacion
 * @property string $asignatario
 */
class patentes extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'autor', 'titulo_invencion', 'estatus_invencion', 'anio_estatus', 'clasificacion', 'asignatario'], 'required'],
            [['User_id'], 'integer'],
            [['anio_estatus'], 'safe'],
            [['autor', 'titulo_invencion', 'estatus_invencion', 'clasificacion', 'asignatario'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Patentes_id' => 'ID Patentes ',
            'User_id' => 'Usuario',
            'autor' => 'Autor',
            'titulo_invencion' => 'Título de la Invención',
            'estatus_invencion' => 'Estatus de la Invención',
            'anio_estatus' => 'Año del Estatus',
            'clasificacion' => 'Clasificación',
            'asignatario' => 'Asignatario',
        ];
    }

    /**
     * Convierte ciertos atributos a mayúsculas antes de guardar.
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Convertir los atributos de texto a mayúsculas antes de guardar
            $this->autor = strtoupper($this->autor);
            $this->titulo_invencion = strtoupper($this->titulo_invencion);
            $this->estatus_invencion = strtoupper($this->estatus_invencion);
            $this->clasificacion = strtoupper($this->clasificacion);
            $this->asignatario = strtoupper($this->asignatario);
            return true;
        } else {
            return false;
        }
    }
}
