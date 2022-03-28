<?php
require "../vendor/autoload.php";

use app\models\Task;

$testTask = new Task(503, 354);
echo "Проверка: getNewStatus(Task::ACTION_COMPLETE) - ";
echo $testTask->getNewStatus(Task::ACTION_COMPLETE) === Task::STATUS_COMPLETED;
echo "<br>";
echo "Проверка: getNewStatus(Task::ACTION_CANCEL) - ";
echo $testTask->getNewStatus(Task::ACTION_CANCEL) === Task::STATUS_CANCELLED;
echo "<br><br>";

echo "Проверка: getAvailableActions(Task::STATUS_NEW), пользователь: заказчик - ";
echo $testTask->getAvailableActions(Task::STATUS_NEW, 1, 1, 5) === "Отменить";
echo "<br>";
echo "Проверка: getAvailableActions(Task::STATUS_NEW), пользователь: исполнитель - ";
echo $testTask->getAvailableActions(Task::STATUS_NEW, 1, 5, 1) === "Откликнуться";
echo "<br>";
echo "Проверка: getAvailableActions(Task::STATUS_IN_PROCESS), пользователь: заказчик - ";
echo $testTask->getAvailableActions(Task::STATUS_IN_PROCESS, 1, 1, 5) === "Выполнено";
echo "<br>";
echo "Проверка: getAvailableActions(Task::STATUS_IN_PROCESS), пользователь: исполнитель - ";
echo $testTask->getAvailableActions(Task::STATUS_IN_PROCESS, 1, 5, 1) === "Отказаться";
echo "<br>";
echo "Проверка: getAvailableActions(Task::STATUS_COMPLETED), пользователь: заказчик - ";
echo $testTask->getAvailableActions(Task::STATUS_COMPLETED, 1, 1, 5) === false;
echo "<br>";
echo "Проверка: getAvailableActions(Task::STATUS_COMPLETED), пользователь: исполнитель - ";
echo $testTask->getAvailableActions(Task::STATUS_COMPLETED, 1, 5, 1) === false;
echo "<br>";
