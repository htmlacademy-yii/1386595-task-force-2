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

    // Возвращает "карту" доступных статусов
    public function getStatusesMap()
    {
        $statuses =
            [
            self::STATUS_NEW => 'Новое',
            self::STATUS_CANCELLED => 'Отменено',
            self::STATUS_IN_PROCESS => 'В работе',
            self::STATUS_COMPLETED => 'Выполнено',
            self::STATUS_FAILED => 'Провалено',
        ];

        //return "Доступные статусы: <br>";
        foreach ($statuses as $key => $status) {
            return $key . " -> " . $status . "<br>";
        }
    }

    // Возвращает "карту" доступных действий
    public function getActionsMap()
    {
        $actions = [
            self::ACTION_CANCEL => 'Отменить',
            self::ACTION_RESPOND => 'Откликнуться',
            self::ACTION_COMPLETE => 'Выполнено',
            self::ACTION_REFUSE => 'Отказаться',
        ];

        //return "Доступные действия: <br>";
        foreach ($actions as $key => $action) {
            return $key . " -> " . $action . "<br>";
        }
    }

    // Возвращает имя статуса, в который перейдёт задание после выполнения действия $action
    public function getNewStatus($action)
    {
        switch ($action) {
            case self::ACTION_CANCEL:
                return self::STATUS_CANCELLED . "<br>";
                break;
            case self::ACTION_RESPOND:
                return self::STATUS_IN_PROCESS . "<br>";
                break;
            case self::ACTION_COMPLETE:
                return self::STATUS_COMPLETED . "<br>";
                break;
            case self::ACTION_REFUSE:
                return self::STATUS_FAILED . "<br>";
                break;
            default:
                return "Указано некорректное действие. <br>";
        }
    }

    // Определяет список доступных действий в текущем статусе
    public function getAvailableActions($status)
    {
        switch ($status) {
            case self::STATUS_NEW:
                return self::ACTION_CANCEL . ", " . self::ACTION_RESPOND;
                break;
            case self::STATUS_CANCELLED:
                return "нет доступных действий <br>";
                break;
            case self::STATUS_IN_PROCESS:
                return self::ACTION_COMPLETE . ", " . self::ACTION_REFUSE;
                break;
            case self::STATUS_COMPLETED:
                return "нет доступных действий <br>";
                break;
            case self::STATUS_FAILED:
                return "нет доступных действий <br>";
                break;
        }
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
