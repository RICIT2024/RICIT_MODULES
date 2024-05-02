<?php

namespace ricit\humhub\modules\test\models;

use Yii;

/**
 * This is the model class for table "cap_libros".
 *
 * @property int $Cap_id
 * @property int $User_id
 * @property int $Anio
 * @property string $Titulo_capitulo
 * @property string $Autor_libro                                                                                                   
 * @property string $Autores_capitulo                                                                                                                                                                                                      
 * @property string $Paginas
 * @property string $Titulo_libro
 * @property string $Editores
 * @property string $ISBN
 * @property string $URL
 * @property string $Palabras_clave
 */
class CapLibros extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cap_libros';
    }
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'Anio', 'Titulo_capitulo', 'Autor_libro', 'Autores_capitulo', 'Resumen', 'Paginas', 'Titulo_libro', 'Editores', 'ISBN', 'Palabras_clave', 'Formato'], 'required'],
            [['User_id', 'Anio'], 'integer'],
            [['Titulo_capitulo', 'Autor_libro', 'Autores_capitulo', 'Resumen', 'Titulo_libro', 'Editores', 'URL', 'Palabras_clave', 'Formato'], 'string', 'max' => 255],
            [['Paginas', 'ISBN'], 'string', 'max' => 50],
        ];
    }

    // Define  relacion inversa con scientific_production table
    public function getScientificProductions()
    {
        return $this->hasMany(ScientificProduction::class, ['P_id' => 'Cap_id']);
    }

    // Obtiene el id del usuario
    public function getId()
       {
           return $this->User_id;
       }

    // Define un metodo para retornar las opciones para Tipo
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
            'Cap_id' => 'Cap ID',
            'User_id' => 'USER ID',
            'Anio' => 'AÑO',
            'Titulo_capitulo' => 'TITULO CAPITULO',
            'Autor_libro' => 'AUTOR LIBRO',
            'Autores_capitulo' => 'AUTORES CAPITULO',
            'Resumen' => 'RESUMEN (ABSTRACT)',
            'Paginas' => 'PAGINAS',
            'Titulo_libro' => 'TITULO LIBRO',
            'Editores' => 'EDITOR(ES)',
            'ISBN' => 'ISBN',
            'URL' => 'URL',
            'Palabras_clave' => 'PALABRAS CLAVE',
            'Formato' => 'FORMATO'
        ];
    }
}
