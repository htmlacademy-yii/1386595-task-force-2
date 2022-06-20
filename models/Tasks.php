<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tasks}}".
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
 *
 * @property Categories $categories
 */
class Tasks extends \yii\db\ActiveRecord

{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tasks}}';
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
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::class, ['id' => 'id'])->
            viaTable('tasks_to_categories', ['task_id' => 'category_id']);
    }

}
