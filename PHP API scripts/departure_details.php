<?php

$api_key = $_ENV['API_KEY'];
$dep_iata = "LTN";

$url = "https://airlabs.co/api/v9/schedules?dep_iata=$dep_iata&api_key=$api_key";

$response = file_get_contents($url);
$departures = json_decode($response, true);

?>