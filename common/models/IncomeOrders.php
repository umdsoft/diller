<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "income_orders".
 *
 * @property int $id
 * @property string $created
 * @property string $updated
 * @property string $number_full
 * @property int $number
 * @property int|null $status
 * @property int $branch_id
 *
 * @property Branches $branch
 * @property IncomeOrderProducts[] $incomeOrderProducts
 */
class IncomeOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'income_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'updated'], 'safe'],
            [['number_full', 'number', 'branch_id'], 'required'],
            [['number', 'status', 'branch_id'], 'integer'],
            [['number_full'], 'string', 'max' => 255],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branch_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created' => 'Yaratildi',
            'updated' => 'So`ngi o`zgarish',
            'number_full' => 'Raqami',
            'number' => 'Raqami',
            'status' => 'Status',
            'branch_id' => 'Filial',
        ];
    }

    /**
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branches::className(), ['id' => 'branch_id']);
    }

    /**
     * Gets query for [[IncomeOrderProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncomeOrderProducts()
    {
        return $this->hasMany(IncomeOrderProducts::className(), ['order_id' => 'id']);
    }
}
