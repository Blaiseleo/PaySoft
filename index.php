<?php
if(isset($_POST['signin'])) {
    if(isset($_POST['email']) && isset($_POST['password'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!$email == 'admin@admin.com' && !$password == 'password'){
            $msg = "Incorrect details";
        }else{
            header("location:./main.php");
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
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    <body>
    <div class="container">
        <div class="sign_in_container">
            <h3>Sign In To PaySoft Admin<br><span>Portal</span></h3>
            <br><br>
            <form method="post" action="#" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                <i class="fa fa-envelope signin_fa"><label class="control-label">EMAIL ADDRESS</label>
                </i><input type="text" name="email" class="control" required/>
                <br><br>
                <i class="fa fa-key signin_fa"></i> <label class="control-label">PASSWORD</label>
                <input type="password" name="password" class="control" required/>
                <h6 class="pull-right" style="margin-right: 25px;"><a href="#">Forgot Password?</a> </h6>
                <br><br><br><br>
                <center><input type="submit" name="signin" Value="Sign in" class="btn btn-primary submit"></center>
                <br><br>
                <center><h4 style="color: darkred"> <?= $msg; ?></h4></center>
            </form>
        </div>
    </div>
    </body>
</html>