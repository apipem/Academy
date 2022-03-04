<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $idCurso
 * @property int $curso
 * @property int $cupos
 * @property string $jornada
 * @property string $año
 *
 * @property Estudiantecurso[] $estudiantecursos
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['curso', 'cupos', 'jornada', 'año'], 'required'],
            [['curso', 'cupos'], 'integer'],
            [['jornada'], 'string'],
            [['año'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCurso' => 'Id Curso',
            'curso' => 'Curso',
            'cupos' => 'Cupos',
            'jornada' => 'Jornada',
            'año' => 'Año',
        ];
    }

    /**
     * Gets query for [[Estudiantecursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantecursos()
    {
        return $this->hasMany(Estudiantecurso::className(), ['curso_idCurso' => 'idCurso']);
    }
}
