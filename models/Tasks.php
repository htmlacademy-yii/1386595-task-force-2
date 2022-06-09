<?php

namespace app\models;

/**
 * This is the model class for table "tasks".
 *
 * @property int $id
 * @property int $city_id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property int $price
 * @property string $deadline
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Tasks extends \yii\db\ActiveRecord

{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'user_id', 'name', 'description', 'price', 'deadline', 'status'], 'required'],
            [['city_id', 'user_id', 'price'], 'integer'],
            [['deadline', 'created_at', 'updated_at'], 'safe'],
            [['name', 'description', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'City ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'deadline' => 'Deadline',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return TasksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TasksQuery(get_called_class());
    }
}
