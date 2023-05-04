<?php

$api_key = "28b1cda9-24ff-4c3d-8f83-2195d132f66e";
$arr_iata = "LTN";

$url = "https://airlabs.co/api/v9/schedules?arr_iata=$arr_iata&api_key=$api_key";

$response = file_get_contents($url);
$arrivals = json_decode($response, true);

?>