<?php
require "../vendor/autoload.php";

use app\models\Task;

$testTask = new Task(503, 354);
echo "Проверка: getNewStatus(Task::ACTION_COMPLETE) <br>Ожидаем: completed<br>Результат: ";
echo $testTask->getNewStatus(Task::ACTION_COMPLETE);
echo "<br>";
echo "Проверка: getNewStatus(Task::ACTION_CANCEL) <br>Ожидаем: cancelled<br>Результат: ";
echo $testTask->getNewStatus(Task::ACTION_CANCEL);
echo "<br><br>";

echo "Проверка: getAvailableActions(Task::STATUS_IN_PROCESS) <br>Ожидаем: cancel, respond <br> Результат: ";
var_dump($testTask->getAvailableActions(Task::STATUS_NEW));
echo "<br>";
echo "Проверка: getAvailableActions(Task::STATUS_COMPLETED) <br>Ожидаем: bool(false)<br>Результат: ";
var_dump($testTask->getAvailableActions(Task::STATUS_COMPLETED));
