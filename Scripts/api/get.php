<?php

if (extension_loaded('curl') == false) {
    throw new \Exception('curl not installed');
}


$url = 'https://jsonplaceholder.typicode.com/todos/1';

$connection = curl_init($url);

curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($connection);
curl_close($connection);

print_r(json_decode($response));

