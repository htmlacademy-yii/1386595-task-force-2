<?php
declare (strict_types = 1);

namespace app\models;

use app\exceptions\TaskException;

class CSVToSQLConverter
{
    public $CSVFileObject;

    public function createSQLFromCSV($file, $directory): void
    {
        if (!file_exists($file)) {
            throw new TaskException('Такого файла не существует');
        }

        if (!file_exists($directory) && !mkdir($directory)) {
            throw new TaskException('Не удалось создать директорию');
            mkdir($directory);
        }

        try {
            $this->CSVFileObject = new \SplFileObject($file, 'r');
        } catch (TaskException) {
            throw new TaskException('Не удалось открыть файл на чтение');
        }

        $this->CSVFileObject->setFlags(\SplFileObject::DROP_NEW_LINE | \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY | \SplFileObject::READ_CSV);

        $headerData = implode(', ', $this->getHeaderData());

        $values[] =
            sprintf(
            "\t(%s)",
            implode(', ', array_map(function ($item) {
                return "'{$item}'";
            }, $this->CSVFileObject->fgetcsv(',')))
        );

        $newFile = basename($file, '.csv');

        try {
            $SQLFileObject = new \SplFileObject("$directory/$newFile.sql", 'w');
        } catch (TaskException) {
            throw new TaskException('Не удалось создать или записать в файл');
        }

        $SQLFileObject->fwrite("INSERT INTO $newFile ($headerData) VALUES {implode(', ' , $values)};");
    }

    public function getHeaderData(): ?array
    {
        $data = $this->CSVFileObject->fgetcsv();

        return $data;
    }
}
