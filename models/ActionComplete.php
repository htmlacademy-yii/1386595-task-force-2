<?php
namespace app\models;

class ActionComplete extends Action
{
    public function getName()
    {
        return "Выполнено";
    }

    public function getInnerName()
    {
        return "complete";
    }

    public function checkUserRole($userId, $customerId, $executorId)
    {
        return ($userId == $customerId) ? true : false;
    }
}
