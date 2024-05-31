<?php

namespace ricit\humhub\modules\cientificos\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "eventos_cientificos".
 *
 * @property int $Eventos_id
 * @property int $User_id
 * @property string $Evento
 * @property string $Nombre
 * @property string $Participación
 * @property string $Titulo
 * @property string $Anio
 * @property string $Pais
 */
class cientificos extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eventos_cientificos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['User_id', 'Evento', 'Nombre', 'Participación', 'Titulo', 'Anio', 'Pais'], 'required'],
            [['User_id'], 'integer'],
            [['Anio'], 'safe'],
            [['Evento', 'Nombre', 'Participación', 'Titulo', 'Pais'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Eventos_id' => 'ID Eventos ',
            'User_id' => 'Usuario',
            'Evento' => 'Evento',
            'Nombre' => 'Nombre del evento',
            'Participación' => 'Participación',
            'Titulo' => 'Título',
            'Anio' => 'Año',
            'Pais' => 'País',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(cientificos::class, ['User_id' => 'User_id']);
    }
}
