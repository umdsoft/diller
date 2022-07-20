<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bank".
 *
 * @property int $id
 * @property string $mfo
 * @property string $name
 *
 * @property ClientAccounts[] $clientAccounts
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mfo', 'name'], 'required'],
            [['mfo', 'name'], 'string', 'max' => 255],
            [['mfo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mfo' => 'Mfo',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ClientAccounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientAccounts()
    {
        return $this->hasMany(ClientAccounts::className(), ['bank_id' => 'id']);
    }
}
