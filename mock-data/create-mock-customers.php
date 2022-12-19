<?php

require_once 'vendor/autoload.php';

// CSV HEADER
$headers = ['firstname', 'lastname', 'email', 'company_name', 'company_id', 'company_address', 'phone'];

// Number of lines
$totalLines = 10;
$filepath = './data/customer.csv';

// Create faker object with specific language

$faker = Faker\Factory::create('en_US');

$csvData[0] = $headers;
for ($lineNumber = 1; $lineNumber < $totalLines; $lineNumber++) {
	$lineData = [];
	$lineData[] = $faker->firstName();
	$lineData[] = $faker->lastName();
	$lineData[] = $faker->email();
	$lineData[] = $faker->company();
	$lineData[] = $faker->ein();
	$lineData[] = $faker->address();
	$lineData[] = $faker->phoneNumber();

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

