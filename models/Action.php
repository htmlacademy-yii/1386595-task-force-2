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

class ActionCancel extends Action
{
    public function getActionName()
    {
        return "Отменить";
    }

    public function getInnerActionName()
    {
        return "ACTION_CANCEL";
    }

    public function checkUserRole($userID, $customerID, $executorID)
    {
        return ($userID == $customerID) ? true : false;
    }
}

class ActionRespond extends Action
{
    public function getActionName()
    {
        return "Откликнуться";
    }

    public function getInnerActionName()
    {
        return "ACTION_RESPOND";
    }

    public function checkUserRole($userID, $customerID, $executorID)
    {
        return ($userID == $executorID) ? true : false;
    }
}

class ActionComplete extends Action
{
    public function getActionName()
    {
        return "Выполнено";
    }

    public function getInnerActionName()
    {
        return "ACTION_COMPLETE";
    }

    public function checkUserRole($userID, $customerID, $executorID)
    {
        return ($userID == $customerID) ? true : false;
    }
}

class ActionRefuse extends Action
{
    public function getActionName()
    {
        return "Отказаться";
    }

    public function getInnerActionName()
    {
        return "ACTION_REFUSE";
    }

    public function checkUserRole($userID, $customerID, $executorID)
    {
        return ($userID == $executorID) ? true : false;
    }
}
