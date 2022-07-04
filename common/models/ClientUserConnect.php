<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client_user_connect".
 *
 * @property int $client_id
 * @property int $subject_id
 * @property int|null $status
 *
 * @property Clients $client
 * @property ClientSubjects $subject
 */
class ClientUserConnect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_user_connect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'subject_id'], 'required'],
            [['client_id', 'subject_id', 'status'], 'integer'],
            [['client_id', 'subject_id'], 'unique', 'targetAttribute' => ['client_id', 'subject_id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => ClientSubjects::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Mijoz',
            'subject_id' => 'Tadbirkorlik subyekti',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'client_id']);
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
