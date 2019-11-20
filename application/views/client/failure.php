<?php 
$MERCHANT_KEY = "5fYs2pB7"; //change  merchant with yours
$SALT = "50FlZtE3k4";  //change salt with yours 
            //optional udf values 
$PAYU_BASE_URL = "https://sandboxsecure.payu.in";       // For Sandbox Mode
$action = $PAYU_BASE_URL . '/_payment';
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Form HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>public/client_assets/css/style.css" />

    <link rel="stylesheet" type="text/css" href="https://fiddle.jshell.net/css/result-light.css">
    <link href="<?= base_url() ?>public/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    
    <link href="<?= base_url() ?>public/client_assets/css/custom.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/client_assets/css/normalize.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>public/client_assets/css/bootstrap.min.css" />

</head>

<style type="text/css"></style>

<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        
                        <div class="booking-form">
                            
        <div class="panel panel-primary setup-content" id="step-5">
            <div class="panel-heading">
                 <h3 class="panel-title">Failed</h3>
            </div>
            <div class="panel-body">
                <fieldset><span class="pull-right clickable close-icon" data-effect=fadeOut><i class="fa fa-times"></i></span>
                                <p class=text-center><img alt="" src="<?=base_url()?>public/client_assets/img/megapolis.png">
                                    <h3 class="text-center">Failed !</h3>
                                 <p class="text-center">Invalid Transaction. Please try again </p></h3>
                                    <p class="text-center"e>You can get in touch with us over email <a href=mailto:sales@megapolis.co.in>sales@megapolis.co.in</a> or contact us at +9595330033.</p></fieldset>
                
            </div>
        </div>                          
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

</body>
</html>