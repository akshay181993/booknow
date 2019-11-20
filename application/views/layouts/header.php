<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin | <?php if(isset($title)) { echo $title;} else {echo "";}?></title>
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url() ?>public/assets/images/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url() ?>public/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/assets/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    
    <!-- Bootstrap Select Css -->
    <link href="<?= base_url() ?>public/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url() ?>public/assets/plugins/animate-css/animate.css" rel="stylesheet" />
    
    <!-- JQuery DataTable Css -->
    <link href="<?= base_url() ?>public/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- gallery Css -->
    <link href="<?= base_url() ?>public/assets/plugins/light-gallery/css/lightgallery.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="<?= base_url() ?>public/assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?= base_url() ?>public/assets/css/style.css" rel="stylesheet">     
    <!-- Sweetalert Css -->
    <link href="<?= base_url() ?>public/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url() ?>public/assets/css/themes/theme-blue.css" rel="stylesheet" />
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->        