<?php

namespace ricit\humhub\modules\test\models;
use ricit\humhub\modules\test\models\Ponencias;
use Yii;


/**
 * This is the model class for table "scientific_production".
 *
 * @property int $SP_id
 * @property int $User_id
 * @property int $P_id
 * @property string $Tipo tipo de contenido (libro, articulo, capitulo de libro, ponencia)
 *  * @property string $Date 

 * Propiedades auxiliares, sin ellas las columnas retornan (not set)
 * @property string $Autor
 * @property string $Anio
 * @property string $Resumen

 */
class ScientificProduction extends \yii\db\ActiveRecord
{
    public $Autor;
    public $Anio;
    public $Titulo;
    public $Resumen;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scientific_production';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'P_id', 'Tipo', 'Date'], 'required'],
            [['User_id', 'P_id'], 'integer'],
            [['Tipo'], 'string', 'max' => 255],
            [['Date'], 'string', 'max' => 255],
        ];
    }

       // Define relacion con libros table
       public function getLibro()
       {
           return $this->hasOne(Libros::class, ['Libro_id' => 'P_id']);
       }
   
       // Define relacion con cap_libros table
       public function getCapLibro()
       {
           return $this->hasOne(CapLibros::class, ['Cap_id' => 'P_id']);
       }
   
       // Define relacion con articulos table
       public function getArticulo()
       {
           return $this->hasOne(Articulos::class, ['Articulos_id' => 'P_id']);
       }

        // Define relacion con ponencia table
        public function getPonencia()
        {
            return $this->hasOne(Ponencias::class, ['Ponencia_id' => 'P_id']);
        }

        
        // Define relacion con tesis table
        public function getTesis()
        {
            return $this->hasOne(Ponencias::class, ['Tesis_id' => 'P_id']);
        }

        public function getTableName($Tipo)
        {
            // Determine the table name based on Tipo
            // Assuming P_id references one of: ponencias, libros, cap_libros, articulos, tesis
            switch ($Tipo) {
                case 'Congreso':
                    return 'ponencias';
                case 'Simposio':
                    return 'ponencias';
                case 'Foro':
                    return 'ponencias';
                case 'Seminario':
                    return 'ponencias';
                case 'Panel':
                    return 'ponencias';
                case 'Otro':
                    return 'ponencias';
                case 'Libro':
                    return 'libros';
                case 'Capitulo':
                    return 'cap_libros';
                case 'Articulo':
                    return 'articulos';
                case 'Tesis':
                    return 'TesisController';
                default:
                    // Handle default case or throw an exception
                    throw new \Exception('Invalid Type value');
            }
        }


     // Gets user id
       public function getId()
       {
           return $this->User_id;
       }
   
    //obtiene el total De registro
    public function getTotal()
    {
        return $this->find()->count();
    }

    //obtiene el total De Articulos
    public function getArticulosTotal()
    {
        return $this->find()->where(["Tipo"=>'Articulo'])->count();
    }

    //obtiene el total De Libros
    public function getLibrosTotal()
    {
        return $this->find()->where(["Tipo"=>'Libro'])->count();
    }

    //obtiene el total De Capitulos Libros
    public function getCapitulosTotal()
    {
        return $this->find()->where(["Tipo"=>'Capitulo'])->count();
    }

    //obtiene el total De Ponencias
    public function getPonenciasTotal()
    {
        $ponencia = NEW Ponencias();
        return $ponencia->getTotal();
    }

    //obtiene el total De Tesis
    public function getTesisTotal()
    {
        return $this->find()->where(["Tipo"=>'Tesis'])->count();
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SP_id' => 'Sp ID',
            'User_id' => 'User ID',
            'P_id' => 'P ID',
            'Tipo' => 'Tipo',
            'Date' => 'Date',

        ];
    }
}
