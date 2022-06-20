<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
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
 * @property Categories $categories
 * @property Cities $cities
 */
class Users extends \yii\db\ActiveRecord

{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
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
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::class, ['id' => 'id'])->
            viaTable('users_to_categories', ['user_id' => 'category_id']);
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'id'])->
            viaTable('users_to_cities', ['user_id' => 'city_id']);
    }
}
