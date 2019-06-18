<?php
    include("./api-header.php");

    //List Recipient API
    $get_data = callAPI('GET', 'https://api.paystack.co/transferrecipient', false);
    $response = json_decode($get_data);
    echo $response->meta->total;
    echo "<br>";
?>