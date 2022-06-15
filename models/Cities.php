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
 * @property Users $id0
 * @property Categories[] $ids
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
            'name' => 'Name',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
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

    /**
     * Gets query for [[Ids]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(Categories::className(), ['id' => 'id'])->via('users');
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasOne(Users::className(), ['id' => 'id']);
    }
}
