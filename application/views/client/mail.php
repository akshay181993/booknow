<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ddsd</title>
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <style type="text/css">
            @font-face{
                font-family:'Open Sans';
                font-style:normal;
                font-weight:400;
                src:local('Open Sans'),
                    local('OpenSans'),
                    url('http://fonts.gstatic.com/s/opensans/v10/cJZKeOuBrn4kERxqtaUH3bO3LdcAZYWl9Si6vvxL-qU.woff') format('woff');
            }
        </style>
    </head>
    <body style="font-family:'Open Sans';padding:0;margin:0;background: #dcdbd7">
        <br/><br/>
        <table style="width:600px;margin:0 auto;font-size:14px;font-family:'Open Sans';" cellpadding="0" cellspacing="0">
        <tr>
               <td style="text-align:center"><a href=""><img src="<?= base_url()?>public/assets/images/megapolis.png" class='img-responsive' title='Megapolis Logo'>
                </a><br/><br/></td>
            </tr>
            <tr>
                <td style="background: #fff; border:1px solid #ccc">
                    <table style="width:100%;color:#444;margin:0 auto;font-size:13px;font-family:'Open Sans';" cellpadding="10px" cellspacing="10px">
                        <tr>
                            <td>
                                <p><?php if(isset($message) && !empty($message)) echo $message; ?></p><br>
                                <p><i>Thanks and regards,</i></p>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td>
                                <a href="https://www.megapolis.co.in/springs/assets/doc/Brochure-Portrait-Print.pdf"><img src="https://www.megapolis.co.in/springs/assets/img/pdf.png" class='img-responsive' title='E Brochure' width="120"; height="120";><br></a>
                            </td>
                        </tr> -->
                    </table>
                </td>
            </tr>
        </table> 
           <p style="text-align: center;font-size: 11px;color:#555">&copy; <?= date("Y"); ?> 
            <?php echo base_url(); ?> </p>
        <br/><br/>
    </body>
</html>
