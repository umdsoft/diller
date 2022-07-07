<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string|null $email
 * @property string $name
 * @property int $status
 * @property string|null $auth_key
 * @property string|null $verification_token
 * @property string|null $password_reset_token
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ClientUserConnect[] $clientUserConnects
 * @property ClientSubjects[] $subjects
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'name'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'email', 'name', 'auth_key', 'verification_token', 'password_reset_token'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Telefon',
            'password' => 'Parol',
            'email' => 'Email',
            'name' => 'FIO',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'verification_token' => 'Verification Token',
            'password_reset_token' => 'Password Reset Token',
            'created_at' => 'Yaratildi',
            'updated_at' => 'O`zgartirildi',
        ];
    }

    /**
     * Gets query for [[ClientUserConnects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientUserConnects()
    {
        return $this->hasMany(ClientUserConnect::className(), ['client_id' => 'id']);
    }

    /**
     * Gets query for [[Subjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(ClientSubjects::className(), ['id' => 'subject_id'])->viaTable('client_user_connect', ['client_id' => 'id']);
    }
}
