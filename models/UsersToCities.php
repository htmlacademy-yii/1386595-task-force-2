<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users_to_cities}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $city_id
 *
 * @property Users $id0
 */
class UsersToCities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users_to_cities}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'city_id'], 'required'],
            [['user_id', 'city_id'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'city_id' => 'City ID',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Users::className(), ['id' => 'id']);
    }
}
