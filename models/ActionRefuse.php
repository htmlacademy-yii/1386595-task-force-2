<?php
namespace app\models;

class ActionRefuse extends Action
{
    public function getName()
    {
        return "Отказаться";
    }

    public function getInnerName()
    {
        return "refuse";
    }

    public function checkUserRole($userId, $customerId, $executorId)
    {
        return $userId == $executorId;
    }
}
