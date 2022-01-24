<?php
class Task
{
    const STATUS_NEW = 'new';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_IN_PROCESS = 'inProcess';
    const STATUS_COMPLETED = 'completed';
    const STATUS_FAILED = 'failed';

    const ACTION_CANCEL = 'cancel';
    const ACTION_RESPOND = 'respond';
    const ACTION_COMPLETE = 'complete';
    const ACTION_REFUSE = 'refuse';

    private $customerId;
    private $executorId;

    public function __construct($customerId, $executorId)
    {
        $this->customerId = $customerId;
        $this->executorId = $executorId;
    }

    // public function getStatus()
    // {
    //     $statuses = ['Новое', 'Отменено', 'В работе', 'Выполнено', 'Провалено'];
    // }

    // public function getAction()
    // {
    //     $actions = ['Отменить', 'Откликнуться', 'Выполнено', 'Отказаться'];
    // }

    // Возвращает "карту" доступных статусов
    public function getStatusesMap()
    {
        $statuses =
            [
            'STATUS_NEW' => 'Новое',
            'STATUS_CANCELLED' => 'Отменено',
            'STATUS_IN_PROCESS' => 'В работе',
            'STATUS_COMPLETED' => 'Выполнено',
            'STATUS_FAILED' => 'Провалено',
        ];

        echo "Доступные статусы: <br>";
        foreach ($statuses as $var => $status) {
            echo "-> " . $status . "<br>";
        }
    }

    // Возвращает "карту" доступных действий
    public function getActionsMap()
    {
        $actions = [
            'ACTION_CANCEL' => 'Отменить',
            'ACTION_RESPOND' => 'Откликнуться',
            'ACTION_COMPLETE' => 'Выполнено',
            'ACTION_REFUSE' => 'Отказаться',
        ];

        echo "Доступные действия: <br>";
        foreach ($actions as $var => $action) {
            echo "-> " . $action . "<br>";
        }
    }

    // Возвращает имя статуса, в который перейдёт задание после выполнения действия $action
    public function getNewStatus($action)
    {
        switch ($action) {
            case 'Отменить':
                $newStatus = 'отменено';
                break;
            case 'Откликнуться':
                $newStatus = 'в работе';
                break;
            case 'Выполнено':
                $newStatus = 'выполнено';
                break;
            case 'Отказаться':
                $newStatus = 'провалено';
                break;
        }

        echo "Новый статус задания: $newStatus <br>";

    }

    // Определяет список доступных действий в текущем статусе
    public function getAvailableActions($status)
    {
        switch ($status) {
            case 'Новое':
                $availableActions = ['Отменить', 'Откликнуться'];
                break;
            case 'Отменено':
                $availableActions = ['нет доступных действий'];
                break;
            case 'В работе':
                $availableActions = ['Выполнено', 'Отказаться'];
                break;
            case 'Выполнено':
                $availableActions = ['нет доступных действий'];
                break;
            case 'Провалено':
                $availableActions = ['нет доступных действий'];
                break;
        }

        echo "Список доступных действий: <br>";
        foreach ($availableActions as $status) {
            echo "-> " . $status . "<br>";
        }

    }

}

$testTask = new Task(503, 354);
$testTask->getNewStatus('Откликнуться');
$testTask->getAvailableActions('В работе');

/*
> Необходимо написать класс, который будет:
Определять список из всех доступных действий и статусов;
Возвращать имя статуса, в который перейдёт задание после выполнения конкретного действия;
Определять список доступных действий в текущем статусе;
Хранить текущий статус задания;
Хранить ID исполнителя и ID заказчика.

> Детали реализации класса
+ в виде констант в классе должны быть перечислены все возможные действия и статусы.
Константа определяет внутреннее имя для статуса/действия.
? класс имеет методы для возврата «карты» статусов и действий. Карта — это ассоциативный массив, где ключ — внутреннее имя, а значение — названия статуса/действия на русском.
+ во внутренних свойствах класс хранит ID исполнителя и ID заказчика. Эти значения класс получает в своём конструкторе.
+ класс имеет метод для получения статуса, в которой он перейдёт после выполнения указанного действия
? класс имеет метод для получения доступных действий для указанного статуса

> Постарайтесь придерживаться следующего плана:
1. Посмотрите на список всех доступных действий и статусов в техническом задании;
2. Набросайте публичный интерфейс класса (публичные методы, свойства конструктор: всё без реализации самих методов);
3. Обсудите это с наставником;
4. Добавьте реализацию пустым методам;
5. Проверьте корректность работы на тестовом сценарии.
 */
