<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiantecurso".
 *
 * @property int $idestudianteCurso
 * @property int $Estudiante_idestudiante
 * @property int $curso_idCurso
 * @property string $complemento
 *
 * @property Curso $cursoIdCurso
 * @property Estudiante $estudianteIdestudiante
 */
class EstudianteCurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiantecurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Estudiante_idestudiante', 'curso_idCurso', 'complemento'], 'required'],
            [['Estudiante_idestudiante', 'curso_idCurso'], 'integer'],
            [['complemento'], 'string', 'max' => 5],
            [['Estudiante_idestudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['Estudiante_idestudiante' => 'idestudiante']],
            [['curso_idCurso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['curso_idCurso' => 'idCurso']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idestudianteCurso' => 'Idestudiante Curso',
            'Estudiante_idestudiante' => 'Estudiante Idestudiante',
            'curso_idCurso' => 'Curso Id Curso',
            'complemento' => 'Complemento',
        ];
    }

    /**
     * Gets query for [[CursoIdCurso]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCursoIdCurso()
    {
        return $this->hasOne(Curso::className(), ['idCurso' => 'curso_idCurso']);
    }

    /**
     * Gets query for [[EstudianteIdestudiante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteIdestudiante()
    {
        return $this->hasOne(Estudiante::className(), ['idestudiante' => 'Estudiante_idestudiante']);
    }
}
