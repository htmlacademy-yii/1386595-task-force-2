<?php
require "../vendor/autoload.php";

use app\models\CSVToSQLConverter;

$convertCities = new CSVToSQLConverter();
$convertCities->createSQLFromCSV('../data/cities.csv', '../data/sql');

$convertCategories = new CSVToSQLConverter();
$convertCategories->createSQLFromCSV('../data/categories.csv', '../data/sql');
