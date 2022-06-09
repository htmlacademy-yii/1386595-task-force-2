<?php

namespace app\controllers;

use yii\db\Query;
use yii\web\Controller;

class CategoriesController extends Controller
{
    public function actionIndex()
    {
        $query = new Query();
        $query->select(['id', 'name'])->from('categories');
        $rows = $query->all();
        foreach ($rows as $row) {
            print($row['name']);
        }
    }
}
