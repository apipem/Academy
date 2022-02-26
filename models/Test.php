<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $idtest
 * @property string $Name
 * @property int $number
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Name', 'number'], 'required'],
            [['number'], 'integer'],
            [['Name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtest' => 'Idtest',
            'Name' => 'Name',
            'number' => 'Number',
        ];
    }
}
