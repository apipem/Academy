<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "observaciones".
 *
 * @property int $idobservaciones
 * @property int $funcionario_idfuncionarios
 * @property int $Estudiante_idestudiante
 * @property string $observacion
 * @property string|null $estado
 *
 * @property Estudiante $estudianteIdestudiante
 * @property Funcionario $funcionarioIdfuncionarios
 */
class Observaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'observaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['funcionario_idfuncionarios', 'Estudiante_idestudiante', 'observacion'], 'required'],
            [['funcionario_idfuncionarios', 'Estudiante_idestudiante'], 'integer'],
            [['observacion'], 'string'],
            [['estado'], 'string', 'max' => 45],
            [['Estudiante_idestudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['Estudiante_idestudiante' => 'idestudiante']],
            [['funcionario_idfuncionarios'], 'exist', 'skipOnError' => true, 'targetClass' => Funcionario::className(), 'targetAttribute' => ['funcionario_idfuncionarios' => 'idfuncionarios']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idobservaciones' => 'Idobservaciones',
            'funcionario_idfuncionarios' => 'Funcionario Idfuncionarios',
            'Estudiante_idestudiante' => 'Estudiante Idestudiante',
            'observacion' => 'Observacion',
            'estado' => 'Estado',
        ];
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

    /**
     * Gets query for [[FuncionarioIdfuncionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarioIdfuncionarios()
    {
        return $this->hasOne(Funcionario::className(), ['idfuncionarios' => 'funcionario_idfuncionarios']);
    }
}
