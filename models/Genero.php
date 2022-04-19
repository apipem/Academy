<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property int $idGenero
 * @property string $nombre
 *
 * @property Persona[] $personas
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idGenero' => 'Id Genero',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Personas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['genero' => 'idGenero']);
    }
}
