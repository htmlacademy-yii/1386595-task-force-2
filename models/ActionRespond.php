<?php
namespace app\models;

class ActionRespond extends Action
{
    public function getActionName()
    {
        return "Откликнуться";
    }

    public function getInnerActionName()
    {
        return "respond";
    }

    public function checkUserRole($userID, $customerID, $executorID)
    {
        return ($userID == $executorID) ? true : false;
    }
}
