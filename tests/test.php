<?php

require '../models/Task.php';

$testTask = new Task(503, 354);
echo "Проверка: getNewStatus(Task::ACTION_COMPLETE) <br>Ожидаем: completed<br>Результат: ";
echo $testTask->getNewStatus(Task::ACTION_COMPLETE);

echo $testTask->getAvailableActions(Task::STATUS_NEW);
//echo $testTask->getStatusesMap();
//echo $testTask->getActionsMap();
