<?php

namespace ricit\humhub\modules\software\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "desarrollosoftware".
 *
 * @property int $Software_id
 * @property int $User_id
 * @property string $autor
 * @property string $anio_publicacion
 * @property string $titulo
 * @property string $sistema
 * @property string $descripcion
 * @property string $disponible
 */
class software extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'desarrollosoftware';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'autor', 'anio_publicacion', 'titulo', 'sistema', 'descripcion', 'disponible'], 'required'],
            [['User_id'], 'integer'],
            [['anio_publicacion'], 'safe'],
            [['autor', 'titulo', 'sistema', 'descripcion', 'disponible'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Software_id' => 'ID Software',
            'User_id' => 'Usuario',
            'autor' => 'Autor',
            'anio_publicacion' => 'Año de Publicación',
            'titulo' => 'Título',
            'sistema' => 'Sistema Operativo',
            'descripcion' => 'Descripción',
            'disponible' => 'Disponible para uso',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(software::class, ['User_id' => 'User_id']);
    }

    /**
     * Convierte ciertos atributos a mayúsculas antes de guardar.
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Convertir los atributos de texto a mayúsculas antes de guardar
            $this->autor = strtoupper($this->autor);
            $this->titulo = strtoupper($this->titulo);
            $this->sistema = strtoupper($this->sistema);
            $this->descripcion = strtoupper($this->descripcion);
            $this->disponible = strtoupper($this->disponible);
            return true;
        } else {
            return false;
        }
    }
}
