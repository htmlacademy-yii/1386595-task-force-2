<?php
namespace app\models;

class ActionCancel extends Action
{
    public function getName()
    {
        return "Отменить";
    }

    public function getInnerName()
    {
        return "cancel";
    }

    public function checkUserRole($userId, $customerId, $executorId)
    {
        return $userId == $customerId;
    }
}
