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
        }

        try {
            $this->CSVFileObject = new \SplFileObject($file, 'r');
        } catch (TaskException $e) {
            throw new TaskException('Не удалось открыть файл на чтение');
        }

        $this->CSVFileObject->setFlags(\SplFileObject::DROP_NEW_LINE | \SplFileObject::READ_AHEAD | \SplFileObject::SKIP_EMPTY | \SplFileObject::READ_CSV);

        $headerData = implode(', ', $this->getHeaderData());

        while (!$this->CSVFileObject->eof()) {
            $values[] =
                sprintf(
                "\t(%s)",
                implode(', ', array_map(function ($item) {
                    return "'{$item}'";
                }, $this->CSVFileObject->fgetcsv(',')))
            );
        }

        $newFile = basename($file, '.csv');

        try {
            $SQLFileObject = new \SplFileObject("$directory/$newFile.sql", 'w');
        } catch (TaskException $e) {
            throw new TaskException('Не удалось создать или записать в файл');
        }

        foreach ($values as $row) {
            $SQLFileObject->fwrite("INSERT INTO $newFile ($headerData) VALUES $row;");
        }

        // $SQLFileObject->fwrite("
        // mysqlimport
        //     --ignore-lines=1
        //     --fields-terminated-by=,
        //     --columns='$headerData'
        //     --local -u root
        //     -p '$newFile'
        //     '$file';
        // ");

    }

    public function getHeaderData(): ?array
    {
        $this->CSVFileObject->rewind();
        $data = $this->CSVFileObject->current();

        return $data;
    }
}
