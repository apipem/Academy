<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "matricula".
 *
 * @property int $idestudianteCurso
 * @property int $estudiante
 * @property int $curso
 * @property string $complemento
 * @property int $sede
 * @property int $jornada
 *
 * @property Curso $curso0
 * @property Estudiante $estudiante0
 * @property Jornada $jornada0
 * @property Sede $sede0
 */
class Matricula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matricula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estudiante', 'curso', 'complemento', 'sede', 'jornada'], 'required'],
            [['estudiante', 'curso', 'sede', 'jornada'], 'integer'],
            [['complemento'], 'string', 'max' => 5],
            [['jornada'], 'exist', 'skipOnError' => true, 'targetClass' => Jornada::className(), 'targetAttribute' => ['jornada' => 'idJornada']],
            [['sede'], 'exist', 'skipOnError' => true, 'targetClass' => Sede::className(), 'targetAttribute' => ['sede' => 'idSede']],
            [['estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['estudiante' => 'idestudiante']],
            [['curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['curso' => 'idCurso']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idestudianteCurso' => 'Idestudiante Curso',
            'estudiante' => 'Estudiante',
            'curso' => 'Curso',
            'complemento' => 'Complemento',
            'sede' => 'Sede',
            'jornada' => 'Jornada',
        ];
    }

    /**
     * Gets query for [[Curso0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurso0()
    {
        return $this->hasOne(Curso::className(), ['idCurso' => 'curso']);
    }

    /**
     * Gets query for [[Estudiante0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiante0()
    {
        return $this->hasOne(Estudiante::className(), ['idestudiante' => 'estudiante']);
    }

    /**
     * Gets query for [[Jornada0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJornada0()
    {
        return $this->hasOne(Jornada::className(), ['idJornada' => 'jornada']);
    }

    /**
     * Gets query for [[Sede0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSede0()
    {
        return $this->hasOne(Sede::className(), ['idSede' => 'sede']);
    }
}
