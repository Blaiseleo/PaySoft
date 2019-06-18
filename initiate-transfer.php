<?php
    include("./api-header.php");

    if(isset($_POST['initiate'])) {
	
		$msg = "initiate button clicked";

		if(isset($_POST['source']) && isset($_POST['reason']) && isset($_POST['amount']) && isset($_POST['recip'])){
			
			$source = $_POST['source']; 
			$reason = $_POST['reason'];
			$amount = $_POST['amount'];
			$recip = $_POST['recip'];

			$msg = "values present";
            
            //Create Recipient API
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.paystack.co/transfer",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => false,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "source=$source&reason=$reason&amount=$amount&recipient=$recip",
			  CURLOPT_HTTPHEADER => array(
			    "Authorization: Bearer sk_test_e86f74dea3b77a63e06bc4a527cdec45b25c8baa",
			  ),
			));
			
			$response = curl_exec($curl);
			$err = curl_error($curl);
			
			curl_close($curl);
            
			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  echo "<script>alert('SUCCESS')</script>";
			}
		
		}
		
	}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="HandheldFriendly" content="true">
        
        <title>Paystack</title>
    
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    <body>
        <!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

        <div class="header"></div>
        
        <div class="navbar">
            <?php include("./sidebar.php");?>
        </div>

        <div class="body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Initiate Transfer</h2>

                        <form method="post" action="#" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group required">
                                <label class="col-sm-2 control-label">Source</label>
                                <div class="col-sm-8">
                                    <input type="text" name="source"  value="balance" class="form-control" required readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Desc</label>
                                <div class="col-sm-8">
                                    <input type="text" name="reason" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Amount</label>
                                <div class="col-sm-8">
                                  <input type="number" name="amount" class="form-control">
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-2 control-label">Recipient </label>
                                <div class="col-sm-8">
                                    <select name="recip" class="form-control" required> 
                                        <option value="">Select Recipient</option>
                                        <?php 

                                            //List Recipient API
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
                                                $json = json_decode($response, true);
                                                $recipient = $json['data'];
                                                foreach($recipient as $key => $val){
                                        ?>
                                        <option value="<?= $val['recipient_code'] ?>"><?= $val['name'] ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-sm-offset-4">
                                <button class="btn btn-default" type="submit">Cancel</button>
                                <input type="submit" name="initiate" Value="Transfer" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="js/jquery.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
        <script src="js/script.js"></script>
    </body>
</html>