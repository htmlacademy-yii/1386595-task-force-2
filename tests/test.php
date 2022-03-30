<?php
require "../vendor/autoload.php";

use app\models\ActionCancel;
use app\models\ActionComplete;
use app\models\ActionRefuse;
use app\models\ActionRespond;
use app\models\Task;

$testTask = new Task(503, 533, 503); // id юзера, id заказчика, id исполнителя
echo "Проверка: getNewStatus(Task::ACTION_COMPLETE) - ";
echo $testTask->getNewStatus(Task::ACTION_COMPLETE) === Task::STATUS_COMPLETED;
echo "<br>";
echo "Проверка: getNewStatus(Task::ACTION_CANCEL) - ";
echo $testTask->getNewStatus(Task::ACTION_CANCEL) === Task::STATUS_CANCELLED;
echo "<br><br>";

echo "Проверка: getAvailableActions(Task::STATUS_NEW), пользователь: заказчик - ";
print_r($testTask->getAvailableActions(Task::STATUS_NEW, $testTask->userId, $testTask->customerId, $testTask->executorId) == new ActionCancel);
echo "<br>";

echo "Проверка: getAvailableActions(Task::STATUS_NEW), пользователь: исполнитель - ";
print_r($testTask->getAvailableActions(Task::STATUS_NEW, $testTask->userId, $testTask->customerId, $testTask->executorId) == new ActionRespond);
echo "<br>";

echo "Проверка: getAvailableActions(Task::STATUS_IN_PROCESS), пользователь: заказчик - ";
print_r($testTask->getAvailableActions(Task::STATUS_IN_PROCESS, $testTask->userId, $testTask->customerId, $testTask->executorId) == new ActionComplete);
echo "<br>";

echo "Проверка: getAvailableActions(Task::STATUS_IN_PROCESS), пользователь: исполнитель - ";
print_r($testTask->getAvailableActions(Task::STATUS_IN_PROCESS, $testTask->userId, $testTask->customerId, $testTask->executorId) == new ActionRefuse);
echo "<br>";

echo "Проверка: getAvailableActions(Task::STATUS_COMPLETED), пользователь: заказчик - ";
echo $testTask->getAvailableActions(Task::STATUS_COMPLETED, $testTask->userId, $testTask->customerId, $testTask->executorId) === false;
echo "<br>";

echo "Проверка: getAvailableActions(Task::STATUS_COMPLETED), пользователь: исполнитель - ";
echo $testTask->getAvailableActions(Task::STATUS_COMPLETED, $testTask->userId, $testTask->customerId, $testTask->executorId) === false;
echo "<br>";
