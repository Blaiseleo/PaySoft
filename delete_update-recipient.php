<?php

    include("./api-header.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        if (isset($_POST['update'])){
            if (isset($_POST['name']) && isset($_POST['email'])){
                $name = $_POST['name'];
                $email = $_POST['email'];

                //Update recipient function call
                $data = "name=$name&email=$email";
                $get_data = callAPI("PUT", "https://api.paystack.co//transferrecipient/".$id, $data);
            }
        }
        if (isset($_POST['delete'])){ //Delete recipient
            $curl = curl_init(); //creating curl resource

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // Just to carry out test
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//  Just to carry out test
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co//transferrecipient/$id",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "DELETE",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer sk_test_e86f74dea3b77a63e06bc4a527cdec45b25c8baa"
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);

            //callAPI('DELETE', 'https://api.paystack.co//transferrecipient/'.$id, false);

        }

        header("location:./manage-recipients.php");

    }
?>