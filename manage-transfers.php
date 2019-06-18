<?php
    include("./api-header.php");
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

                                <h2 class="page-title">Manage Transfers</h2>

                                <div class="panel-heading">All Transfers</div>
                                    <div class="panel-body" style="overflow-x: hidden; overflow-x: auto; height: 500px;">
                                        <table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th>Recipient Name</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th>Recipient Name</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                                <?php
                                                    //List Transfer function call
                                                    $get_data = callAPI("GET", "https://api.paystack.co/transfer", false);
                                                    $response = json_decode($get_data, true);
                                                    $recipient = $response['data'];
                                                    foreach($recipient as $key => $val){
                                                        $count = $count + 1;
                                                 ?>
                                                     <tr>
                                                        <td><?= $count ?></td>
                                                        <td><?= $val['recipient']['name'] ?></td>
                                                        <td><?= $val['reason'] ?></td>
                                                        <td><?= "N".$val['amount'] ?></td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>

                                    </div>
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