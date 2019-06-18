<?php
    include("./api-header.php");
    
    //Delete Recipient API
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transferrecipient",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "Authorization: Bearer sk_test_e86f74dea3b77a63e06bc4a527cdec45b25c8baa"
        ),
      ));
      
      $response = curl_exec($curl);
      $err = curl_error($curl);
      
      curl_close($curl);
      
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
          $object = json_decode($response);
          
          $id = $object->data[0]->id;
          
          $curl = curl_init();
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
          $err = curl_error($curl);
          
          curl_close($curl);
          
          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
              $object = json_decode($response);
              
              echo $object->message;
              echo "<br>";
              header("location:./manage-recipients.php");
          }
          
      }
?>