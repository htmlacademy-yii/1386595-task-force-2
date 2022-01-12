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

    public function getStatus()
    {
        $statuses = ['Новое', 'Отменено', 'В работе', 'Выполнено', 'Провалено'];
    }

    public function getAction()
    {
        $actions = ['Отменить', 'Откликнуться', 'Выполнено', 'Отказаться'];
    }

    public function getStatusesMap()
    {

    }

    public function getActionsMap()
    {

    }

    public function getNewStatus($action)
    {

    }

    public function getAvailableActions($status)
    {

    }

}

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

$required = ['title', 'description'];
$fields = array_merge($required, array_keys($_POST));

+ класс имеет методы для возврата «карты» статусов и действий. Карта — это ассоциативный массив, где ключ — внутреннее имя, а значение — названия статуса/действия на русском.
- во внутренних свойствах класс хранит ID исполнителя и ID заказчика. Эти значения класс получает в своём конструкторе.
- класс имеет метод для получения статуса, в которой он перейдёт после выполнения указанного действия
- класс имеет метод для получения доступных действий для указанного статуса

> Постарайтесь придерживаться следующего плана:
1. Посмотрите на список всех доступных действий и статусов в техническом задании;
2. Набросайте публичный интерфейс класса (публичные методы, свойства конструктор: всё без реализации самих методов);
3. Обсудите это с наставником;
4. Добавьте реализацию пустым методам;
5. Проверьте корректность работы на тестовом сценарии.
 */
