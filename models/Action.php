<?php
namespace app\models;

abstract class Action
{
    public $userID;
    public $customerID;
    public $executorID;

    // возвращает название действия
    abstract public function getActionName();

    // возвращает внутреннее имя действия
    abstract public function getInnerActionName();

    // проверка прав (сравнивает id юзера/id заказчика/id исполнителя?)
    abstract public function checkUserRole($userID, $customerID, $executorID);
}
