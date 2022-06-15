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
 * @property Cities $id0
 * @property Categories $id1
 * @property Tasks[] $ids
 * @property UsersToCities $usersToCities
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
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Cities::className(), 'targetAttribute' => ['id' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['id' => 'id']],
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
        return $this->hasOne(Categories::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Cities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasOne(Cities::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Cities::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Id1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId1()
    {
        return $this->hasOne(Categories::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Ids]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(Tasks::className(), ['id' => 'id'])->via('categories');
    }

    /**
     * Gets query for [[UsersToCities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersToCities()
    {
        return $this->hasOne(UsersToCities::className(), ['id' => 'id']);
    }
}
