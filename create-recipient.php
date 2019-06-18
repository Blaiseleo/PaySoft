<?php
    include("./api-header.php");

    if(isset($_POST['create_recepient'])){
	
		if(isset($_POST['type']) && isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['acc'])&& isset($_POST['bank']) ){
			
			$type = $_POST['type']; 
			$name = $_POST['name'];
            $email = $_POST['email']; 
			$mtd = $_POST['mtd'];
			$desc = $_POST['desc'];
			$acc = $_POST['acc'];
			$currency = $_POST['currency'];
			$bank = $_POST['bank'];

            //Create Recipient API
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.paystack.co/transferrecipient",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => false,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "type=$type&name=$name&email=$email&metadata=$mtd&description=$desc&account_number=$acc&currency=$currency&bank_code=$bank",
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

                        <h2 class="page-title">Create Recipient</h2>

                        <form method="post" action="#" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group required">
                                <label class="col-sm-2 control-label">type</label>
                                <div class="col-sm-8">
                                    <input type="text" name="type"  value="nuban" class="form-control" required readonly>
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name"  class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" name="email"  class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Metadata</label>
                                <div class="col-sm-8">
                                    <textarea name="mtd" class="form-control" ></textarea>
                                    <label style="color: red; font-size: 10px;">Additional Info: json format accepted only</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Desc</label>
                                <div class="col-sm-8">
                                    <input type="text" name="desc"  class="form-control" >
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-2 control-label">Acc</label>
                                <div class="col-sm-8">
                                    <input type="number" name="acc" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Currency</label>
                                <div class="col-sm-8">
                                    <input type="text" name="currency"  class="form-control" >
                                </div>
                            </div>

                            <div class="form-group required">
                                <label class="col-sm-2 control-label">Bank </label>
                                <div class="col-sm-8">
                                    <select name="bank" class="form-control" required> 
                                        <option value="">Select Bank</option>
                                            <?php 
                                                //Bank code API
                                                curl_setopt_array($curl, array(
                                                    CURLOPT_URL => "https://api.paystack.co/bank",
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
                                        <option value="<?= $val['code'] ?>"><?= $val['name'] ?></option>
                                            <?php } } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-sm-offset-4">
                                <button class="btn btn-default" type="reset">Cancel</button>
                                <input type="submit" name="create_recepient" Value="Create" class="btn btn-primary">
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