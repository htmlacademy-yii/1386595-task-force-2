<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cities}}".
 *
 * @property int $id
 * @property string $name
 * @property float $latitude
 * @property float $longitude
 *
 * @property Users $users
 */
class Cities extends \yii\db\ActiveRecord

{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cities}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'latitude', 'longitude'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::class, ['id' => 'id'])->
            viaTable('users_to_cities', ['user_id' => 'city_id']);
    }
}
