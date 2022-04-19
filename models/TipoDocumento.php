<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_documento".
 *
 * @property int $idTipo_Documento
 * @property string $tipo
 *
 * @property Persona[] $personas
 */
class TipoDocumento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_documento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo'], 'required'],
            [['tipo'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTipo_Documento' => 'Id Tipo Documento',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * Gets query for [[Personas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['TipoDocumento' => 'idTipo_Documento']);
    }
}
