<?php

$api_key = "28b1cda9-24ff-4c3d-8f83-2195d132f66e";
$dep_iata = "LTN";

$url = "https://airlabs.co/api/v9/schedules?dep_iata=$dep_iata&api_key=$api_key";

$response = file_get_contents($url);
$departures = json_decode($response, true);

?>