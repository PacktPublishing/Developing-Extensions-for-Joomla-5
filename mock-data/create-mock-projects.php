<?php

require_once 'vendor/autoload.php';

// CSV HEADER
$headers = ['name', 'alias', 'description', 'deadline'];

// Number of lines
$totalLines = 10;
$filepath = './data/projects.csv';

// Create faker object with specific language

$faker = Faker\Factory::create('en_US');

$csvData[0] = $headers;
for ($lineNumber = 1; $lineNumber < $totalLines; $lineNumber++) {
	$lineData = [];
	$name = $faker->words(2, true);
	$lineData[] = $name;
	$lineData[] = preg_replace('/(\s|[^A-Za-z0-9\-])+/', '-', $name);
	$lineData[] = $faker->text(100);
	$lineData[] = $faker->date();

	$csvData[$lineNumber] = $lineData;
}

// create data folder if it does not exist
if (!file_exists(dirname($filepath))) {
	mkdir(dirname($filepath), 0755);
}

// open CSV file for writing
$file = fopen($filepath, 'w');

foreach ($csvData as $row) {
	fputcsv($file, $row);
}

fclose($file);

