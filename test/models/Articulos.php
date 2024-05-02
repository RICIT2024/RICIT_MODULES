<?php

namespace ricit\humhub\modules\test\models;

use Yii;

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
 * @property string $ISSNs
 * @property string $URL
 * @property string $DOI
 * @property string $Palabras_clave
 */
class Articulos extends \yii\db\ActiveRecord
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
            [['ISSNs'], 'string', 'max' => 20],
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
            'Articulos_id' => 'Articulos ID',
            'User_id' => 'USER ID',
            'Autor' => 'AUTOR',
            'Autores' => 'AUTOR(ES) SECUNDARIO',
            'Anio' => 'AÑO',
            'Titulo' => 'TITULO',
            'Resumen' => 'RESUMEN (ABSTRACT)',
            'Revista' => 'REVISTA',
            'Pais' => 'PAIS',
            'Idioma' => 'IDIOMA',
            'ISSNs' => 'ISSNS',
            'URL' => 'URL',
            'DOI' => 'DOI',
            'Palabras_clave' => 'PALABRAS CLAVE',
        ];
    }
}
