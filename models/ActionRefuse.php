<?php
namespace app\models;

class ActionRefuse extends Action
{
    public function getActionName()
    {
        return "Отказаться";
    }

    public function getInnerActionName()
    {
        return "refuse";
    }

    public function checkUserRole($userID, $customerID, $executorID)
    {
        return ($userID == $executorID) ? true : false;
    }
}
