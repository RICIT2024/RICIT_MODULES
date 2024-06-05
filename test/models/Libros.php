<?php

namespace ricit\humhub\modules\test\models;

use Yii;
use \yii\db\ActiveRecord;


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
class Libros extends ActiveRecord
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
            'Libro_id' => 'ID LIBRO',
            'User_id' => 'Usuario',
            'Autor' => 'Autor',
            'Autores_sec' => 'Autor(es) secundario',
            'Anio' => 'Año',
            'Titulo' => 'Título',
            'Resumen' => 'Resumen',
            'Editorial' => 'Editorial',
            'ISBN' => 'ISBN',
            'Formato' => 'Formato',
            'URL' => 'URL',
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
            $this->Autores_sec = strtoupper($this->Autores_sec);
            $this->Titulo = strtoupper($this->Titulo);
            $this->Resumen = strtoupper($this->Resumen);
            $this->Editorial = strtoupper($this->Editorial);
            $this->Formato = strtoupper($this->Formato);
            $this->Palabras_clave = strtoupper($this->Palabras_clave);
            return true;
        } else {
            return false;
        }
    }
}
