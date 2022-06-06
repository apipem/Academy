<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jornada".
 *
 * @property int $idJornada
 * @property string $nombre
 *
 * @property Matricula[] $matriculas
 */
class Jornada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jornada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idJornada' => 'Id Jornada',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Matriculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::className(), ['jornada' => 'idJornada']);
    }
}
