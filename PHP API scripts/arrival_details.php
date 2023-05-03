<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
$api_key = "28b1cda9-24ff-4c3d-8f83-2195d132f66e";
$arr_iata = "LTN";

$url = "https://airlabs.co/api/v9/flight?arr_iata=$arr_iata&api_key=$api_key";

$response = file_get_contents($url);
$data = json_decode($response, true);
}

if (isset($data['response']['arr_iata'])) 
{
$flight_number = $data['response']['flight_icao'];
$carrier = $data['response']['airline_icao'];
$origin_code = $data['response']['dep_iata'];
$scheduled_arr = date('H:i:s', strtotime($data['response']['arr_time']));
$expected_arr = date('H:i:s', strtotime($data['response']['arr_estimated']));
$status = $data['response']['status'];
} 
?>