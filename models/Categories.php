<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 *
 * @property Users $id0
 * @property Tasks $id1
 * @property Cities[] $ids
 * @property Tasks $tasks
 * @property TasksToCategories $tasksToCategories
 * @property Users $users
 */
class Categories extends \yii\db\ActiveRecord

{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'icon'], 'required'],
            [['icon'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['id' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['id' => 'id']],
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
            'icon' => 'Icon',
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
     * Gets query for [[Id1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId1()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Ids]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(Cities::className(), ['id' => 'id'])->via('users');
    }

    /**
     * Gets query for [[Tasks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Tasks::class, ['id' => 'id'])->viaTable('tasks_to_categories', ['task_id' => 'category_id']);
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
