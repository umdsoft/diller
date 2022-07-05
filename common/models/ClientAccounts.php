<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client_accounts".
 *
 * @property int $id
 * @property int $bank_id
 * @property string $account
 * @property int $subject_id
 *
 * @property Bank $bank
 * @property ClientSubjects $subject
 */
class ClientAccounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bank_id', 'subject_id'], 'required'],
            [['bank_id', 'subject_id'], 'integer'],
            [['account'], 'string', 'max' => 255],
            [['bank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bank::className(), 'targetAttribute' => ['bank_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientSubjects::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'bank_id' => 'Bank',
            'account' => 'Hisob raqami',
            'subject_id' => 'Tadbirkorlik subyekti',
        ];
    }

    /**
     * Gets query for [[Bank]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBank()
    {
        return $this->hasOne(Bank::className(), ['id' => 'bank_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(ClientSubjects::className(), ['id' => 'subject_id']);
    }
}
