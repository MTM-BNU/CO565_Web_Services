<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
$api_key = "28b1cda9-24ff-4c3d-8f83-2195d132f66e";
$dep_iata = "LTN";

$url = "https://airlabs.co/api/v9/flight?dep_iata=$dep_iata&api_key=$api_key";

$response = file_get_contents($url);
$data = json_decode($response, true);
}

if (isset($data['response']['dep_iata'])) 
{
$flight_number = $data['response']['flight_icao'];
$carrier = $data['response']['airline_icao'];
$destination_code = $data['response']['arr_iata'];
$scheduled_dep = date('H:i:s', strtotime($data['response']['dep_time']));
$expected_dep = date('H:i:s', strtotime($data['response']['dep_estimated']));
$status = $data['response']['status'];
} 
?>