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
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
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

                                <h2 class="page-title">Dashboard</h2>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-12 balance">
                                                <div class="panel panel-default">
                                                    <div class="panel-body bk-primary text-light">
                                                        <div class="stat-panel text-center">
                                                            <div class="stat-panel-title text-uppercase"> Account Balance </div>
                                                        </div>
                                                    </div>
                                                    <h2 class="text-center"><?php include("./check-balance.php") ?></h2>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="panel panel-default">
                                                    <div class="panel-body bk-primary text-light">
                                                        <div class="stat-panel text-center">
                                                            <div class="stat-panel-number h1 "><?php include("./list-recipients.php") ?></div>
                                                            <div class="stat-panel-title text-uppercase"> Recipients</div>
                                                        </div>
                                                    </div>
                                                    <a href="./manage-recipients.php" class="block-anchor panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="panel panel-default">
                                                    <div class="panel-body bk-success text-light">
                                                        <div class="stat-panel text-center">
                                                            <div class="stat-panel-number h1 "><?php include("./list-transfer.php") ?></div>
                                                            <div class="stat-panel-title text-uppercase"> Transfers</div>
                                                        </div>
                                                    </div>
                                                    <a href="./manage-transfers.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
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