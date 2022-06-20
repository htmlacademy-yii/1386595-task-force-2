<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%responses}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $task_id
 * @property int $price
 * @property string $created_at
 * @property string $updated_at
 */
class Responses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%responses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'task_id', 'price', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'task_id', 'price'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
            'task_id' => 'Task ID',
            'price' => 'Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
