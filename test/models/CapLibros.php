<?php

namespace ricit\humhub\modules\test\models;

use Yii;
use \yii\db\ActiveRecord;

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
class CapLibros extends ActiveRecord
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
            'Cap_id' => 'ID Capítulos',
            'User_id' => 'Usuario',
            'Anio' => 'Año',
            'Titulo_capitulo' => 'Título del capítulo',
            'Autor_libro' => 'Autor del libro',
            'Autores_capitulo' => 'Autores del capítulo',
            'Resumen' => 'Resumen',
            'Paginas' => 'Páginas',
            'Titulo_libro' => 'Título del libro',
            'Editores' => 'Editor(es)',
            'ISBN' => 'ISBN',
            'URL' => 'URL',
            'Palabras_clave' => 'Palabras clave',
            'Formato' => 'Formato'
        ];
    }
        /**
     * Convierte ciertos atributos a mayúsculas antes de guardar.
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Convertir los atributos de texto a mayúsculas antes de guardar
            $this->Titulo_capitulo = strtoupper($this->Titulo_capitulo);
            $this->Autor_libro = strtoupper($this->Autor_libro);
            $this->Autores_capitulo = strtoupper($this->Autores_capitulo);
            $this->Resumen = strtoupper($this->Resumen);
            $this->Titulo_libro = strtoupper($this->Titulo_libro);
            $this->Editores = strtoupper($this->Editores);
            $this->Palabras_clave = strtoupper($this->Palabras_clave);
            $this->Formato = strtoupper($this->Formato);
            return true;
        } else {
            return false;
        }
    }

    }

