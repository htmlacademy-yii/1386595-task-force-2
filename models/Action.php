<?php
namespace app\models;

abstract class Action
{
    // возвращает название действия
    abstract public function getName();

    // возвращает внутреннее имя действия
    abstract public function getInnerName();

    // проверка прав (сравнивает id юзера/id заказчика/id исполнителя?)
    abstract public function checkUserRole($userId, $customerId, $executorId);
}
