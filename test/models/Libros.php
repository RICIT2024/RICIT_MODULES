<?php

namespace ricit\humhub\modules\test\models;

use Yii;

/**
 * This is the model class for table "libros".
 *
 * @property int $Libro_id
 * @property int $User_id
 * @property string $Autor
 * @property string|null $Autores_sec
 * @property int $Anio
 * @property string $Titulo
 * @property string $Resumen
 * @property string $Editorial
 * @property string $ISBN
 * @property string $Formato
 * @property string $DOI
 * @property string $URL
 * @property string $Palabras_clave
 */
class Libros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'Autor', 'Anio', 'Titulo', 'Resumen', 'Editorial', 'ISBN', 'Formato', 'Palabras_clave'], 'required',],
            [['User_id'], 'integer'],
            [['Anio'], 'integer', 'message'=>'Ingresa un numero valido'],
            [['Autor', 'Autores_sec', 'Titulo', 'Resumen', 'Editorial', 'URL', 'Palabras_clave'], 'string', 'max' => 255],
            [['ISBN'], 'string', 'max' => 20],
            [['Formato'], 'string', 'max' => 50],
        ];
    }

     // Define  relacion inversa con scientific_production table
     public function getScientificProductions()
     {
         return $this->hasMany(ScientificProduction::class, ['P_id' => 'Libro_id']);
     }

    // Obtiene el id del usuario
    public function getId()
    {
        return $this->User_id;
    }

    public static function getFormato()
    {
        return [
              'Digital' => 'Digital',
              'Impreso' => 'Impreso',
              // Add more options as needed
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Libro_id' => 'LIBRO ID',
            'User_id' => 'USER ID',
            'Autor' => 'AUTOR',
            'Autores_sec' => 'AUTOR(ES) SECUNDARIO',
            'Anio' => 'AÑO',
            'Titulo' => 'TITULO',
            'Resumen' => 'RESUMEN (ABSTRACT)',
            'Editorial' => 'EDITORIAL',
            'ISBN' => 'ISBN',
            'Formato' => 'FORMATO',
            'URL' => 'URL',
            'Palabras_clave' => 'PALABRAS CLAVE',
        ];
    }

    
}
