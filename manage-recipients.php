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

        <div class="header"></div>
        
        <div class="navbar">
            <?php include("./sidebar.php");?>
        </div>

        <div class="body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">Manage Recipient</h2>

                        <div class="panel-heading">All Recipients</div>
							<div class="panel-body">git
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
                                                $count = 0;
                                                foreach($recipient as $key => $val){
                                                    $count = $count + 1;
                                         ?>
                                         <tr>
                                            <td><?= $count ?></td>
                                            <td><?= $val['name'] ?></td>
                                            <td><?= $val['email'] ?></td>
                                            <td><?= $val['details']['bank_name'] ?></td>
                                            <td><?= $val['details']['account_number']?></td>
                                            <td>
                                            <a href="./delete-recipient.php" title="Delete Record" onclick="return confirm("Do you want to delete");"><i class="fa fa-close"></i></a></td>

                                            
                                        </tr>     
                                        <?php } } ?>                                   
                                                                                
                                    </tbody>
                                </table>

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