<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "income".
 *
 * @property int $id
 * @property int $supplier_id
 * @property string|null $note
 * @property int|null $warehouse_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $user_id
 *
 * @property IncomeProducts[] $incomeProducts
 * @property IncomeStatus $status
 * @property Suppliers $supplier
 * @property Users $user
 * @property Warehouse $warehouse
 */
class Income extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'income';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['warehouse_id',], 'required'],
            [['warehouse_id', 'user_id'], 'integer'],
            [['note'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['warehouse_id'], 'exist', 'skipOnError' => true, 'targetClass' => Warehouse::className(), 'targetAttribute' => ['warehouse_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'note' => 'Izoh',
            'warehouse_id' => 'Ombor',
            'created_at' => 'Qabul qilindi',
            'updated_at' => 'O`zgartirildi',
            'user_id' => 'Qabul qiluvchi',
        ];
    }

    /**
     * Gets query for [[IncomeProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIncomeProducts()
    {
        return $this->hasMany(IncomeProducts::className(), ['income_id' => 'id']);
    }


    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Warehouse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWarehouse()
    {
        return $this->hasOne(Warehouse::className(), ['id' => 'warehouse_id']);
    }
}
