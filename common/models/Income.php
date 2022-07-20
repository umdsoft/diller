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
 * @property int $status_id
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
            [['supplier_id', 'user_id'], 'required'],
            [['supplier_id', 'warehouse_id', 'status_id', 'user_id'], 'integer'],
            [['note'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => IncomeStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::className(), 'targetAttribute' => ['supplier_id' => 'id']],
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
            'supplier_id' => 'Yetkazib beruvchi',
            'note' => 'Izoh',
            'warehouse_id' => 'Ombor',
            'status_id' => 'Status',
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
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(IncomeStatus::className(), ['id' => 'status_id']);
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Suppliers::className(), ['id' => 'supplier_id']);
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
