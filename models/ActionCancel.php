<?php
namespace app\models;

class ActionCancel extends Action
{
    public function getActionName()
    {
        return "Отменить";
    }

    public function getInnerActionName()
    {
        return "cancel";
    }

    public function checkUserRole($userID, $customerID, $executorID)
    {
        return ($userID == $customerID) ? true : false;
    }
}
