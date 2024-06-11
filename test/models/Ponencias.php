<?php

namespace ricit\humhub\modules\test\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "ponencias".
 *
 * @property int $Ponencia_id
 * @property int $User_id
 * @property string $Tipo
 * @property string $Participación
 * @property string $Autor
 * @property int $Anio
 * @property string $País
 * @property string $Titulo_evento
 * @property string $Titulo_ponencia
 * @property string $Resumen
 * @property string $Memoria
 * @property string $Publicación
 */
class Ponencias extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ponencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'Tipo', 'Participación', 'Autor', 'Anio', 'País', 'Titulo_evento', 'Titulo_ponencia', 'Resumen', 'Memoria','Publicación'], 'required'],
            [['User_id', 'Anio'], 'integer'],
            [['Tipo', 'Participación', 'Autor', 'País', 'Titulo_evento', 'Titulo_ponencia', 'Resumen', 'Memoria', 'Publicación'], 'string', 'max' => 255],
        ];
    }

     // Define un metodo para retornar las opciones para Tipo
     public static function getTipoOptions()
     {
         return [
             'Congreso' => 'Congreso',
             'Simposio' => 'Simposio',
             'Foro' => 'Foro',
             'Seminario' => 'Seminario',
             'Panel' => 'Panel',
             'Otro' => 'Otro',
             // Add more options as needed
         ];
     }


     // Define un metodo para retornar las opciones para Tipo
     public function getTotal()
    {
        return $this->find()->count();
    }
    
     // Define un metodo para retornar total de congresos
     public function getTotalCongreso()
    {
        return $this->find()->where(['Tipo'=>'Congreso'])->count();
    }

     // Define un metodo para retornar total de Simposio
     public function getTotalSimposio()
    {
        return $this->find()->where(['Tipo'=>'Simposio'])->count();
    }
     // Define un metodo para retornar total de congresos
     public function getTotalForo()
    {
        return $this->find()->where(['Tipo'=>'Foro'])->count();
    }

     // Define un metodo para retornar total de congresos
     public function getTotalSeminario()
    {
        return $this->find()->where(['Tipo'=>'Seminario'])->count();
    }

     // Define un metodo para retornar total de congresos
     public function getTotalOtro()
    {
        return $this->find()->where(['Tipo'=>'Otro'])->count();
    }

     // Define un metodo para retornar total de congresos
     public function getTotalPanel()
    {
        return $this->find()->where(['Tipo'=>'Panel'])->count();
    }
     // Define un metodo para retornar las opciones para Tipo
     public static function getMemoriaOptions()
     {
         return [
             'Si' => 'Si',
             'No' => 'No',
             // Add more options as needed
         ];
     }

      // Define un metodo para retornar las opciones para Tipo
      public static function getParticipacionOptions()
      {
          return [
              'Conferencia Magistral' => 'Conferencia Magistral',
              'Ponencia' => 'Ponencia',
              // Add more options as needed
          ];
      }

    // Define relacion inversa con scientific_production table
    public function getScientificProductions()
    {
        return $this->hasMany(ScientificProduction::class, ['P_id' => 'Ponencia_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Ponencia_id' => 'ID Ponencia',
            'User_id' => 'Usuario',
            'Tipo' => 'Tipo',
            'Participación' => 'Participación',
            'Autor' => 'Autor',
            'Anio' => 'Año',
            'País' => 'País',
            'Titulo_evento' => 'Titulo del Evento',
            'Titulo_ponencia' => 'Titulo de la Ponencia',
            'Resumen' => 'Resumen',
            'Memoria' => 'Memoria',
            'Publicación' => 'Publicación'
        ];
    }

       /**
     * Convierte ciertos atributos a mayúsculas antes de guardar.
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Convertir los atributos de texto a mayúsculas antes de guardar
            $this->Tipo = strtoupper($this->Tipo);
            $this->Participación = strtoupper($this->Participación);
            $this->Autor = strtoupper($this->Autor);
            $this->País = strtoupper($this->País);
            $this->Titulo_evento = strtoupper($this->Titulo_evento);
            $this->Titulo_ponencia = strtoupper($this->Titulo_ponencia);
            $this->Resumen = strtoupper($this->Resumen);
            $this->Memoria = strtoupper($this->Memoria);
            $this->Publicación = strtoupper($this->Publicación);
            return true;
        } else {
            return false;
        }
    }
}
