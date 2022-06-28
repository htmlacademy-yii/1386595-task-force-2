<?php

namespace app\controllers;

use app\exceptions\TaskException;
use app\models\FilterForm;
use app\models\Tasks;
use yii\web\Controller;

class TasksController extends Controller
{
    public $layout = 'inner';

    public function actionIndex()
    {

        $tasks = Tasks::find()->where(['status' => 'new'])->orderBy('created_at DESC')->all();
        if (is_null($tasks)) {
            throw new TaskException("нет заданий");
        }

        $filter = new FilterForm();

        return $this->render('index.php', ['tasks' => $tasks, 'filter' => $filter]);
    }
}
