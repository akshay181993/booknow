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



<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-7 col-md-offset-1">

                        <div class="booking-form">

                            <div class="panel panel-primary setup-content" >
                                <div class="panel-heading">
                                   <h3 class="panel-title">Success</h3>
                               </div>
                               <div class="panel-body">
                                <fieldset><span class="pull-right clickable close-icon" data-effect=fadeOut><i class="fa fa-times"></i></span>
                                    <p class=text-center><img alt="" src="<?=base_url()?>public/client_assets/img/megapolis.png">
                                        <h3 class="text-center">CONGRATULATIONS!</h3>
                                        <p class="text-center">Dear <?= $name; ?>, <br>
                                        You have succesfullly booked flat <?= $user_data[0]['project_name']; ?> <?= $user_data[0]['building_name']; ?> - <?= $user_data[0]['flat_no']; ?> </p></h3>
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