<?php

namespace app\models;

use yii\base\Model;

class FilterForm extends Model
{
    public $categories;
    public $hasExecutor;
    public $period;

    public function attributeLabels()
    {
        return [
            'categories' => '',
            'hasExecutor' => 'Без исполнителя',
            'period' => '',
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['categories', 'each', 'rule' => ['inteher']],
            ['hasExecutor', 'number'],
            [['categories', 'hasExecutor', 'period'], 'safe'],
        ];
    }

    public static function getPeriodList()
    {
        return [
            1 => '1 час',
            12 => '12 часов',
            24 => '24 часа',
        ];
    }
}
