<?php
    include("./api-header.php");

    //Check Balance function  call
    $get_data = callAPI("GET", "https://api.paystack.co/balance", false);
    $response = json_decode($get_data);

    echo "N".$response->data[0]->balance;
?>