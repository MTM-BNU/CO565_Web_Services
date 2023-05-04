<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $api_key = {{API_KEY}};
$flight_iata = isset($_POST['flight_iata']) ? $_POST['flight_iata'] : '';

$url = "https://airlabs.co/api/v9/flight?flight_iata=$flight_iata&api_key=$api_key";

$response = file_get_contents($url);
$data = json_decode($response, true);
}

if (isset($data['response']['arr_name'])) {
$flight_name = $data['response']['airline_iata'];
$flight_number = $data['response']['flight_number'];
$destination_code = $data['response']['arr_iata'];

$airport_name_dep = $data['response']['dep_name'];
$airport_code_dep = $data['response']['dep_iata'];
$airport_location_dep = $data['response']['dep_city'];
$takeoff_location = $data['response']['dep_country'];
$takeoff_date = date('Y-m-d', strtotime($data['response']['dep_time']));
$takeoff_time = date('H:i:s', strtotime($data['response']['dep_time']));
$status = $data['response']['status'];

$airport_name_arr = $data['response']['arr_name'];
$airport_code_arr = $data['response']['arr_iata'];
$airport_location_arr = $data['response']['arr_city'];
$landing_location = $data['response']['arr_country'];
$landing_date = date('Y-m-d', strtotime($data['response']['arr_time']));
$landing_time = date('H:i:s', strtotime($data['response']['arr_time']));
$expected_departure_time = date('H:i:s', strtotime($data['response']['dep_estimated']));
} 
?>

