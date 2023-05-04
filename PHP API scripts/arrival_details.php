<?php

$api_key = {{API_KEY}}};
$arr_iata = "LTN";

$url = "https://airlabs.co/api/v9/schedules?arr_iata=$arr_iata&api_key=$api_key";

$response = file_get_contents($url);
$arrivals = json_decode($response, true);

?>