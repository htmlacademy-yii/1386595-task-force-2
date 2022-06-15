<?php

namespace app\controllers;

use app\models\Categories;
use yii\web\Controller;

class CategoriesController extends Controller
{
    public function actionIndex()
    {
        // $query = new Query();
        // $query->select(['id', 'name'])->from('categories');
        // $rows = $query->all();
        // foreach ($rows as $row) {
        //     print($row['name']);
        // }

        $categories = Categories::findOne(1);
        $tasks = $categories->tasks;
        foreach ($tasks as $task) {
            print($task->name);
        }

    }
}
