<?php

    /**
     * Generic function to fetch any of the three endpoints for pandaAPI:
     *  GET - pandaAPI/delays/arrivals{?airline_icao}
     *  GET - pandaAPI/delays/departures{?airline_icao}
     *  GET - pandaAPI/delays{?airline_icao}{&type}
     * 
     *  $endpoint has a value of either 'arrivals', 'departures' or ''
     * 
     *  $airline_icao and $type are possible parameters for fetching the API
     * 
     *  Created by: Tomás Pinto @20th Apr 2023
     */
    function getDelay($airline_icao, $type, $endpoint)
    {
        $url = "https://bold-kilby.44-195-253-114.plesk.page/pandaAPI/delays";

        if($endpoint)
            $url .= "/" . $endpoint; 

        if($airline_icao)
        {
            $query = parse_url($url, PHP_URL_QUERY);
            // Returns a string if the URL has parameters or NULL if not
            if ($query) {
                $url .= "&airline_icao=" + $airline_icao;
            } else {
                $url .= "?airline_icao=" + $airline_icao;
            }
        }

        if($type)
        {
            $query = parse_url($url, PHP_URL_QUERY);
            if ($query) {
                $url .= "&type=" + $type;
            } else {
                $url .= "?type=" + $type;
            }
        }
            
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        
        return $data;
    }
?>