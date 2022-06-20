<?php

namespace app\controllers;

use app\models\Categories;
use yii\web\Controller;

class CategoriesController extends Controller
{
    public function actionIndex()
    {
        $categories = Categories::findOne(1);
        $tasks = $categories->tasks;
        foreach ($tasks as $task) {
            print($task->name);
        }

    }
}
