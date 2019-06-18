<?php
    session_start();
    if(!function_exists('callAPI')){
        function callAPI($method, $url, $data){
            $curl = curl_init(); //creating curl resource

            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // Just to carry out test
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//  Just to carry out test

            switch ($method){
                case "POST":
                    curl_setopt($curl, CURLOPT_POST, 1);
                    if ($data)
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    break;
                case "PUT":
                    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                    if ($data)
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    break;
                default:
                    if ($data)
                        $url = sprintf("%s?%s", $url, http_build_query($data));
            }

            // OPTIONS:
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer sk_test_e86f74dea3b77a63e06bc4a527cdec45b25c8baa'
            ));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);


            //EXECUTE:
            $result = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if(!$result){
                echo "cURL Error #:" . $err."<br>";
                die("Connection Failure");
            }

            return $result;
        }
    }

?>