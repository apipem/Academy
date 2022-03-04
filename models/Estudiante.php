<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property int $idestudiante
 * @property int $estudiante
 * @property string $estado
 * @property int|null $acudiente
 *
 * @property Persona $acudiente0
 * @property Persona $estudiante0
 * @property Estudiantecurso[] $estudiantecursos
 * @property Observaciones[] $observaciones
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estudiante', 'estado'], 'required'],
            [['estudiante', 'acudiente'], 'integer'],
            [['estado'], 'string', 'max' => 45],
            [['estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['estudiante' => 'idPersona']],
            [['acudiente'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['acudiente' => 'idPersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idestudiante' => 'Idestudiante',
            'estudiante' => 'Estudiante',
            'estado' => 'Estado',
            'acudiente' => 'Acudiente',
        ];
    }

    /**
     * Gets query for [[Acudiente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcudiente0()
    {
        return $this->hasOne(Persona::className(), ['idPersona' => 'acudiente']);
    }

    /**
     * Gets query for [[Estudiante0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiante0()
    {
        return $this->hasOne(Persona::className(), ['idPersona' => 'estudiante']);
    }

    /**
     * Gets query for [[Estudiantecursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantecursos()
    {
        return $this->hasMany(Estudiantecurso::className(), ['Estudiante_idestudiante' => 'idestudiante']);
    }

    /**
     * Gets query for [[Observaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObservaciones()
    {
        return $this->hasMany(Observaciones::className(), ['Estudiante_idestudiante' => 'idestudiante']);
    }
}
