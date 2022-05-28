<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $idCurso
 * @property int $curso
 * @property int $cupos
 * @property string $fecha
 *
 * @property Matricula[] $matriculas
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
            [['curso', 'cupos', 'fecha'], 'required'],
            [['curso', 'cupos'], 'integer'],
            [['fecha'], 'string', 'max' => 20],
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
            'fecha' => 'Fecha',
        ];
    }

    /**
     * Gets query for [[Matriculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::className(), ['curso' => 'idCurso']);
    }
}
