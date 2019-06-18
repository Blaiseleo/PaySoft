<?php
    include("./api-header.php");

    //List Transfer function call
    $get_data = callAPI("GET", "https://api.paystack.co/transfer", false);
    $response = json_decode($get_data);
    echo $response->meta->total;

?>