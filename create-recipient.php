<?php
    include("./api-header.php");

    if(isset($_POST['create_recepient'])){
	
		if(isset($_POST['type']) && isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['acc'])&& isset($_POST['bank']) ){
			
			$type = $_POST['type']; 
			$name = $_POST['name'];
            $email = $_POST['email']; 
			$desc = $_POST['desc'];
			$acc = $_POST['acc'];
			$bank = $_POST['bank'];


            $get_data = callAPI("GET", "https://api.paystack.co/transferrecipient", false);
            $response = json_decode($get_data, true); //converted to json

            $recipient = $response['data'];

            $isFound = 0;

            foreach($recipient as $key => $val) {
                if ($acc == $val['details']['account_number']) {
                    $isFound = 1;
                }
            }

            if($isFound){
                $error = "Account number already exist";
            }
            else{
                $data = "type=$type&name=$name&email=$email&description=$desc&account_number=$acc&bank_code=$bank";
                $get_data = callAPI("POST", "https://api.paystack.co/transferrecipient", $data);
                $response = json_decode($get_data);

                if($response->status == true){
                    echo "<script>alert('SUCCESS')</script>";
                }else{
                    $error = $response->status."<br>".$response->message;

                }
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
        
        <title>PaySoft</title>
    
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    <body>
        <!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

        <?php include('header.php'); ?>

        <div class="container" style="width: 90%; margin: 0; padding: 0;">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-3">
                    <div class="navbar">
                        <?php include("./sidebar.php");?>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-9">
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
                                        
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label">Bank </label>
                                            <div class="col-sm-8">
                                                <select name="bank" class="form-control" required>
                                                    <option value="">Select Bank</option>
                                                    <?php

                                                    $get_data = callAPI("GET", "https://api.paystack.co/bank", false);
                                                    $json = json_decode($get_data, true);
                                                    $recipient = $json['data'];
                                                    foreach($recipient as $key => $val){
                                                        ?>
                                                        <option value="<?= $val['code'] ?>"><?= $val['name'] ?></option>
                                                    <?php }  ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-sm-offset-4">
                                            <button class="btn btn-default" type="reset" href="#">Cancel</button>
                                            <input type="submit" name="create_recepient" Value="Create" class="btn btn-primary">
                                            <br><br>
                                            <div><h4 style="color: darkred"> <?= $error; ?></h4></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
        <script src="js/script.js"></script>
    </body>
</html>