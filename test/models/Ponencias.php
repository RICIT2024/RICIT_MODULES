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
         ];
     }

     // Métodos para retornar total de ponencias por tipo
     public static function getTotalCongreso()
    {
        return self::find()->where(['Tipo'=>'Congreso'])->count();
    }

    public static function getTotalSimposio()
    {
        return self::find()->where(['Tipo'=>'Simposio'])->count();
    }

    public static function getTotalForo()
    {
        return self::find()->where(['Tipo'=>'Foro'])->count();
    }

    public static function getTotalSeminario()
    {
        return self::find()->where(['Tipo'=>'Seminario'])->count();
    }

    public static function getTotalOtro()
    {
        return self::find()->where(['Tipo'=>'Otro'])->count();
    }

    public static function getTotalPanel()
    {
        return self::find()->where(['Tipo'=>'Panel'])->count();
    }

     // Define un metodo para retornar las opciones para Memoria
     public static function getMemoriaOptions()
     {
         return [
             'Si' => 'Si',
             'No' => 'No',
         ];
     }

     // Define un metodo para retornar las opciones para Participación
     public static function getParticipacionOptions()
     {
         return [
             'Conferencia Magistral' => 'Conferencia Magistral',
             'Ponencia' => 'Ponencia',
         ];
     }

    // Relación con la tabla scientific_production
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
