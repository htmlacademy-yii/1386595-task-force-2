<?php
namespace app\models;

class ActionComplete extends Action
{
    public function getActionName()
    {
        return "Выполнено";
    }

    public function getInnerActionName()
    {
        return "complete";
    }

    public function checkUserRole($userID, $customerID, $executorID)
    {
        return ($userID == $customerID) ? true : false;
    }
}
