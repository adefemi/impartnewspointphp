<?php 

    function makeRequest($url) {
        $curl_handler = curl_init();
        curl_setopt($curl_handler, CURLOPT_URL, $url);
        curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl_handler);
        curl_close($curl_handler); 

        return json_decode($output, true);
    }