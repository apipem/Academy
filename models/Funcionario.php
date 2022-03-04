<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property int $idfuncionarios
 * @property int $Persona
 *
 * @property Observaciones[] $observaciones
 * @property Persona $persona
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idfuncionarios', 'Persona'], 'required'],
            [['idfuncionarios', 'Persona'], 'integer'],
            [['idfuncionarios'], 'unique'],
            [['Persona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['Persona' => 'idPersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idfuncionarios' => 'Idfuncionarios',
            'Persona' => 'Persona',
        ];
    }

    /**
     * Gets query for [[Observaciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObservaciones()
    {
        return $this->hasMany(Observaciones::className(), ['funcionario_idfuncionarios' => 'idfuncionarios']);
    }

    /**
     * Gets query for [[Persona]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['idPersona' => 'Persona']);
    }
}
