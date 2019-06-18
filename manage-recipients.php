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

        <title>Paystack</title>

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
                                <h2 class="page-title">Manage Recipient</h2>

                                <div class="panel-heading">All Recipients</div>
                                    <div class="panel-body" style="overflow-x: hidden; overflow-x: auto; height: 500px;">
                                        <table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th>recipient Name</th>
                                                    <th>Email</th>
                                                    <th>Bank Name</th>
                                                    <th>Account no  </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th>recipient Name</th>
                                                    <th>Email</th>
                                                    <th>Bank Name</th>
                                                    <th>Account no  </th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                                <?php

                                                    //List Recipient function call
                                                    $get_data = callAPI("GET", "https://api.paystack.co/transferrecipient", false);
                                                    $response = json_decode($get_data, true);

                                                    $recipient = $response['data'];
                                                    $count = 0;
                                                    foreach($recipient as $key => $val){
                                                    $count = $count + 1;
                                                ?>
                                                    <form method="post" action="delete_update-recipient.php?id=<?= $val['id']?>" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                                                         <tr>
                                                            <td><?= $count ?></td>
                                                            <td><input type="text" name="name" value="<?= $val['name'] ?>"/></td>
                                                            <td><input type="email" name="email" value="<?= $val['email'] ?>"/></td>
                                                            <td><?= $val['details']['bank_name'] ?></td>
                                                            <td><?= $val['details']['account_number']?></td>
                                                            <td>
                                                            <button type="submit" name="delete" title="Delete Record" onclick="return confirm('Do you want to delete recipient?')"><i class="fa fa-close"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <button type="submit" name="update" title="Update Record" onclick="return confirm('Do you want to update recipient?')"><i class="fa fa-pencil"></i></button>
                                                         </tr>
                                                    </form>
                                                <?php }  ?>

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