<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sale".
 *
 * @property int $id
 * @property int|null $client_subject_id
 * @property string|null $created
 * @property string|null $updated
 * @property int $total_price
 * @property int $paid
 * @property int|null $payed_id
 * @property int|null $operator_id
 * @property int|null $type_id
 * @property int|null $status_id
 * @property int $branch_id
 *
 * @property Branches $branch
 * @property ClientSubjects $clientSubject
 * @property Users $operator
 * @property Payed $payed
 * @property SalePayHistory[] $salePayHistories
 * @property SaleProducts[] $saleProducts
 * @property SaleStatus $status
 * @property SaleType $type
 */
class Sale extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_subject_id', 'total_price', 'paid', 'payed_id', 'operator_id', 'type_id', 'status_id', 'branch_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['total_price', 'paid', 'branch_id'], 'required'],
            [['client_subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientSubjects::className(), 'targetAttribute' => ['client_subject_id' => 'id']],
            [['operator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['operator_id' => 'id']],
            [['payed_id'], 'exist', 'skipOnError' => true, 'targetClass' => Payed::className(), 'targetAttribute' => ['payed_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleType::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'client_subject_id' => 'Mijoz',
            'created' => 'Yatildi',
            'updated' => 'O`zgartirildi',
            'total_price' => 'Umumiy narxi',
            'paid' => 'To`landi',
            'payed_id' => 'To`lov holati',
            'operator_id' => 'Operator',
            'type_id' => 'Sotuv turi',
            'status_id' => 'Status',
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
     * Gets query for [[ClientSubject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientSubject()
    {
        return $this->hasOne(ClientSubjects::className(), ['id' => 'client_subject_id']);
    }

    /**
     * Gets query for [[Operator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOperator()
    {
        return $this->hasOne(Users::className(), ['id' => 'operator_id']);
    }

    /**
     * Gets query for [[Payed]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayed()
    {
        return $this->hasOne(Payed::className(), ['id' => 'payed_id']);
    }

    /**
     * Gets query for [[SalePayHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalePayHistories()
    {
        return $this->hasMany(SalePayHistory::className(), ['sale_id' => 'id']);
    }

    /**
     * Gets query for [[SaleProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleProducts()
    {
        return $this->hasMany(SaleProducts::className(), ['sale_id' => 'id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(SaleStatus::className(), ['id' => 'status_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(SaleType::className(), ['id' => 'type_id']);
    }
}
