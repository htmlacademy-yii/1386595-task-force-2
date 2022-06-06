<?php
namespace app\models;

class ActionRespond extends Action
{
    public function getName()
    {
        return "Откликнуться";
    }

    public function getInnerName()
    {
        return "respond";
    }

    public function checkUserRole($userId, $customerId, $executorId)
    {
        return $userId == $executorId;
    }
}
