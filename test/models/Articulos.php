<?php

namespace ricit\humhub\modules\test\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "articulos".
 *
 * @property int $Articulos_id
 * @property int $User_id
 * @property string $Autor
 * @property string $Autores
 * @property int $Anio
 * @property string $Titulo
 * @property string $Resumen
 * @property string $Revista
 * @property string $Pais
 * @property string $Idioma
 * @property string $URL
 * @property string $DOI
 * @property string $Palabras_clave
 */
class Articulos extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'Autor', 'Autores', 'Anio', 'Titulo', 'Resumen', 'Revista', 'Pais', 'Idioma', 'ISSNs', 'URL', 'DOI', 'Palabras_clave'], 'required'],
            [['User_id', 'Anio'], 'integer'],
            [['Autor', 'Autores', 'Titulo', 'Resumen', 'Revista', 'URL', 'Palabras_clave'], 'string', 'max' => 255],
            [['Pais', 'Idioma', 'DOI'], 'string', 'max' => 50],
        ];
    }

     // Define  relacion inversa con scientific_production table
     public function getScientificProductions()
     {
         return $this->hasMany(ScientificProduction::class, ['P_id' => 'Articulos_id']);
     }

    // Obtiene el id del usuario
     public function getId()
    {
        return $this->User_id;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Articulos_id' => 'ID Articulos ',
            'User_id' => 'Usuario',
            'Autor' => 'Autor',
            'Autores' => 'Autor(es) secundarios',
            'Anio' => 'Año',
            'Titulo' => 'Título',
            'Resumen' => 'Resumen',
            'Revista' => 'Revista',
            'Pais' => 'País',
            'Idioma' => 'Idioma',
            'URL' => 'URL',
            'DOI' => 'DOI',
            'Palabras_clave' => 'Palabras Clave',
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
            $this->Autores = strtoupper($this->Autores);
            $this->Titulo = strtoupper($this->Titulo);
            $this->Resumen = strtoupper($this->Resumen);
            $this->Revista = strtoupper($this->Revista);
            $this->Pais = strtoupper($this->Pais);
            $this->Idioma = strtoupper($this->Idioma);
            $this->Palabras_clave = strtoupper($this->Palabras_clave);
            return true;
        } else {
            return false;
        }
    }
}
