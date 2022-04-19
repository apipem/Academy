<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property int $idEstado
 * @property string $nombre
 *
 * @property Estudiante[] $estudiantes
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEstado', 'nombre'], 'required'],
            [['idEstado'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['idEstado'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEstado' => 'Id Estado',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['estado' => 'idEstado']);
    }
}
