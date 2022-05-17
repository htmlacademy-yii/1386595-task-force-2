<?php
require "../vendor/autoload.php";

use app\models\CSVToSQLConverter;

$convertCities = new CSVToSQLConverter();
$convertCities->createSQLFromCSV('cities.csv', '../data/sql');
