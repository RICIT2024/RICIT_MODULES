<?php
namespace ricit\humhub\modules\certifi\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "certificaciones".
 *
 * @property int $Certificacion_id
 * @property int $User_id
 * @property string $Nombre_cert
 * @property string $Institución
 * @property int $Vigencia
 */
class Certifi extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'certificaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'Nombre_cert', 'Institución', 'Vigencia'], 'required'],
            [['User_id', 'Vigencia'], 'integer'],
            [['Nombre_cert', 'Institución'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Certificacion_id' => 'ID Certificación',
            'User_id' => 'Usuario',
            'Nombre_cert' => 'Certificación',
            'Institución' => 'Institución',
            'Vigencia' => 'Vigencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Certifi::class, ['User_id' => 'User_id']);
    }

    /**
     * Convierte ciertos atributos a mayúsculas antes de guardar.
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Convertir los atributos de texto a mayúsculas antes de guardar
            $this->Nombre_cert = strtoupper($this->Nombre_cert);
            $this->Institución = strtoupper($this->Institución);
            return true;
        } else {
            return false;
        }
    }
}
