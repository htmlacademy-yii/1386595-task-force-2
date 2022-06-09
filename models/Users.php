<?php

namespace app\models;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $role
 * @property string $name
 * @property string $email
 * @property int $phone
 * @property string $birthdate
 * @property string $created_at
 * @property string $updated_at
 *
 * @property UsersToCities $usersToCities
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
            [['role', 'name', 'email', 'phone', 'birthdate'], 'required'],
            [['phone'], 'integer'],
            [['birthdate', 'created_at', 'updated_at'], 'safe'],
            [['role', 'name', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role' => 'Role',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'birthdate' => 'Birthdate',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
