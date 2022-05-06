<?php
require "../vendor/autoload.php";

use app\exceptions\TaskException;
use app\models\ActionCancel;
use app\models\ActionComplete;
use app\models\ActionRefuse;
use app\models\ActionRespond;
use app\models\Task;

$testTask = new Task(503, 533, 503); // id юзера, id заказчика, id исполнителя

echo "Проверка: getNewStatus(Task::ACTION_COMPLETE) - ";
try {
    echo $testTask->getNewStatus(Task::ACTION_COMPLETE) === Task::STATUS_COMPLETED;
} catch (TaskException $e) {
    echo "TaskException: " . $e->getMessage();
}

echo "<br>";

echo "Проверка: getNewStatus(Task::ACTION_CANCEL) - ";
try {
    echo $testTask->getNewStatus(Task::ACTION_CANCEL) === Task::STATUS_CANCELLED;
} catch (TaskException $e) {
    echo "TaskException: " . $e->getMessage();
}

echo "<br><br>";

echo "Проверка: getAvailableActions(Task::STATUS_NEW), пользователь: заказчик - ";
try {
    print_r($testTask->getAvailableActions(Task::STATUS_NEW, $testTask->userId, $testTask->customerId, $testTask->executorId) instanceof ActionCancel);
} catch (TaskException $e) {
    echo "TaskException: " . $e->getMessage();
}

echo "<br>";

echo "Проверка: getAvailableActions(Task::STATUS_NEW), пользователь: исполнитель - ";
try {
    print_r($testTask->getAvailableActions(Task::STATUS_NEW, $testTask->userId, $testTask->customerId, $testTask->executorId) instanceof ActionRespond);
} catch (TaskException $e) {
    echo "TaskException: " . $e->getMessage();
}

echo "<br>";

echo "Проверка: getAvailableActions(Task::STATUS_IN_PROCESS), пользователь: заказчик - ";
try {
    print_r($testTask->getAvailableActions(Task::STATUS_IN_PROCESS, $testTask->userId, $testTask->customerId, $testTask->executorId) instanceof ActionComplete);
} catch (TaskException $e) {
    echo "TaskException: " . $e->getMessage();
}

echo "<br>";

echo "Проверка: getAvailableActions(Task::STATUS_IN_PROCESS), пользователь: исполнитель - ";
try {
    print_r($testTask->getAvailableActions(Task::STATUS_IN_PROCESS, $testTask->userId, $testTask->customerId, $testTask->executorId) instanceof ActionRefuse);
} catch (TaskException $e) {
    echo "TaskException: " . $e->getMessage();
}

echo "<br>";

echo "Проверка: getAvailableActions(Task::STATUS_COMPLETED), пользователь: заказчик - ";
try {
    echo $testTask->getAvailableActions(Task::STATUS_COMPLETED, $testTask->userId, $testTask->customerId, $testTask->executorId) === false;
} catch (TaskException $e) {
    echo "TaskException: " . $e->getMessage();
}

echo "<br>";

echo "Проверка: getAvailableActions(Task::STATUS_COMPLETED), пользователь: исполнитель - ";
try {
    echo $testTask->getAvailableActions(Task::STATUS_COMPLETED, $testTask->userId, $testTask->customerId, $testTask->executorId) === false;
} catch (TaskException $e) {
    echo "TaskException: " . $e->getMessage();
}

echo "<br>";
