<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sede".
 *
 * @property int $idSede
 * @property string $nombre
 * @property string|null $Direccion
 *
 * @property Matricula[] $matriculas
 */
class Sede extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sede';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSede', 'nombre'], 'required'],
            [['idSede'], 'integer'],
            [['nombre', 'Direccion'], 'string', 'max' => 45],
            [['idSede'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idSede' => 'Id Sede',
            'nombre' => 'Nombre',
            'Direccion' => 'Direccion',
        ];
    }

    /**
     * Gets query for [[Matriculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matricula::className(), ['sede' => 'idSede']);
    }
}
