<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $password
 * @property string|null $created
 * @property string|null $updated
 * @property int|null $role_id
 * @property int $status
 * @property string|null $auth_key
 * @property string|null $verification_token
 * @property string|null $password_reset_token
 * @property int|null $branch_id
 *
 * @property Branches $branch
 * @property Orders[] $orders
 * @property Orders[] $orders0
 * @property Roles $role
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'username', 'password'], 'required'],
            [['created', 'updated'], 'safe'],
            [['role_id', 'status', 'branch_id'], 'integer'],
            [['name', 'username', 'password'], 'string', 'max' => 255],
            [['auth_key', 'verification_token', 'password_reset_token'], 'string', 'max' => 500],
            [['username'], 'unique'],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branches::className(), 'targetAttribute' => ['branch_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'FIO',
            'username' => 'Login',
            'password' => 'Parol',
            'created' => 'Yaratildi',
            'updated' => 'O`zgartirildi',
            'role_id' => 'Huquqi',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'verification_token' => 'Verification Token',
            'password_reset_token' => 'Password Reset Token',
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
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['kuryer_id' => 'id']);
    }

    /**
     * Gets query for [[Orders0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders0()
    {
        return $this->hasMany(Orders::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role_id']);
    }
}
