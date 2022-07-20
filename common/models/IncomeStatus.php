<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "income_status".
 *
 * @property int $id
 * @property string $name
 *
 * @property Income[] $incomes
 */
class IncomeStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'income_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
        ];
    }

    /**
     * Gets query for [[Incomes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncomes()
    {
        return $this->hasMany(Income::className(), ['status_id' => 'id']);
    }
}
