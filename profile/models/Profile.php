<?php

namespace ricit\humhub\modules\profile\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "profile".
 *
 * @property int $user_id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $title
 * @property string|null $gender
 * @property string|null $street
 * @property string|null $zip
 * @property string|null $city
 * @property string|null $country
 * @property string|null $state
 * @property int|null $birthday_hide_year
 * @property string|null $birthday
 * @property string|null $about
 * @property string|null $nacionalidad
 * @property string|null $emailinst
 * @property string|null $idiomas
 * @property string|null $trabactual
 * @property string|null $nomdep
 * @property string|null $paista
 * @property string|null $estadota
 * @property string|null $nomcargota
 * @property string|null $atac2_other_selection
 * @property string|null $sni
 * @property string|null $perfildg
 * @property string|null $rangoga
 * @property string|null $facebook
 * @property string|null $twitter
 * @property string|null $linkedin
 * @property string|null $google
 * @property string|null $fechaingreso
 * @property string|null $correocont
 * @property string|null $aboutme
 * @property string|null $entidad
 * @property string|null $municipio
 * @property string|null $aniosexperiencias
 */
class Profile extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'birthday_hide_year'], 'integer'],
            [['birthday'], 'safe'],
            [['about'], 'string'],
            [['firstname', 'lastname', 'title', 'gender', 'street', 'zip', 'city', 'country', 'state', 'nacionalidad', 'emailinst', 'idiomas', 'trabactual', 'nomdep', 'paista', 'estadota', 'nomcargota', 'atac2_other_selection', 'sni', 'perfildg', 'rangoga', 'facebook', 'twitter', 'linkedin', 'google', 'fechaingreso', 'correocont', 'aboutme', 'entidad', 'municipio', 'aniosexperiencias'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ID de usuario',
            'firstname' => 'Nombre',
            'lastname' => 'Apellido',
            'title' => 'Título',
            'gender' => 'Género',
            'street' => 'Calle',
            'zip' => 'Código postal',
            'city' => 'Ciudad',
            'country' => 'País',
            'state' => 'Estado',
            'birthday_hide_year' => 'Ocultar año de nacimiento',
            'birthday' => 'Fecha de nacimiento',
            'about' => 'Acerca de',
            'nacionalidad' => 'Nacionalidad',
            'emailinst' => 'Correo institucional',
            'idiomas' => 'Idiomas',
            'trabactual' => 'Trabajo actual',
            'nomdep' => 'Nombre del departamento',
            'paista' => 'País del trabajo',
            'estadota' => 'Estado del trabajo',
            'nomcargota' => 'Nombre del cargo',
            'atac2_other_selection' => 'Otra selección',
            'sni' => 'SNI',
            'perfildg' => 'Perfil DG',
            'rangoga' => 'Rango de edad',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'linkedin' => 'LinkedIn',
            'google' => 'Google',
            'fechaingreso' => 'Fecha de ingreso',
            'correocont' => 'Correo de contacto',
            'aboutme' => 'Acerca de mí',
            'entidad' => 'Entidad',
            'municipio' => 'Municipio',
            'aniosexperiencias' => 'Años de experiencia',
        ];
    }
}
