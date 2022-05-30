<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property int $idestudiante
 * @property int $estudiante
 * @property int|null $acudiente
 * @property int $estado
 *
 * @property Persona $acudiente0
 * @property Estado $estado0
 * @property Persona $estudiante0
 * @property Matricula[] $matriculas
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
            [['estudiante', 'acudiente', 'estado'], 'integer'],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado' => 'idEstado']],
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
            'acudiente' => 'Acudiente',
            'estado' => 'Estado',
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
     * Gets query for [[Estado0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstado0()
    {
        return $this->hasOne(Estado::className(), ['idEstado' => 'estado']);
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
     * Gets query for [[Matriculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::className(), ['estudiante' => 'idestudiante']);
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
