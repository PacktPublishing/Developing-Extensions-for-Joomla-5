<?php

if (extension_loaded('curl') == false) {
    throw new \Exception('curl not installed');
}

$url = 'https://YourSite.com/api/v1/projects/';

$data = array(
    'title' => 'Testing API',
    'alias' => 'testing-api',
    'description' => 'We are testing our API on this project.'
);

$connection = curl_init($url);

curl_setopt($connection, CURLOPT_RETURNTRANSFER, true);
curl_setopt($connection, CURLOPT_URL, $url);
curl_setopt($connection, CURLOPT_POST, true);
curl_setopt($connection, CURLOPT_POSTFIELDS, http_build_query($data));

$response = curl_exec($connection);

curl_close($connection);

if ($response === false) {
    echo 'Error: ' . curl_error($connection);
} else {
    echo 'Project created!';
}

