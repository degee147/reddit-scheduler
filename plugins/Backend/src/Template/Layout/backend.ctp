<?php $siteDescription = 'Reddit Scheduler';?>
<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Jankara ">
    <title>
        <?=$this->fetch('title')?> ::
        <?=$siteDescription?>
    </title>
    <link rel="apple-touch-icon" sizes="60x60" href="<?=$this->Url->build('/', true);?>app-assets/img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=$this->Url->build('/', true);?>app-assets/img/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=$this->Url->build('/', true);?>app-assets/img/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=$this->Url->build('/', true);?>app-assets/img/ico/apple-icon-152.png">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="<?=$this->Url->build('/', true);?>app-assets/img/ico/favicon.ico"> -->
    <!-- <link rel="shortcut icon" href="<?=$this->Url->build('/frontend/', true);?>img/favicon.ico"> -->
    <link rel="shortcut icon" type="image/png" href="<?=$this->Url->build('/', true);?>app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?=$this->Url->build('/', true);?>app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$this->Url->build('/', true);?>app-assets/fonts/simple-line-icons/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?=$this->Url->build('/', true);?>app-assets/fonts/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?=$this->Url->build('/', true);?>plugins/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?=$this->Url->build('/', true);?>app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$this->Url->build('/', true);?>app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$this->Url->build('/', true);?>app-assets/vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$this->Url->build('/', true);?>app-assets/vendors/css/tables/datatable/datatables.min.css">

    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$this->Url->build('/', true);?>app-assets/css/app.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
     <?= $this->element('custom_css')?>
    <!-- END Custom CSS-->


    <link rel="stylesheet" href="<?=$this->Url->build('/', true);?>plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?=$this->Url->build('/', true);?>plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?=$this->Url->build('/', true);?>plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?=$this->Url->build('/', true);?>plugins/select2/select2-bootstrap.min.css">
    <link href="<?=$this->Url->build('/', true);?>plugins/bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?=$this->Url->build('/', true);?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css">




    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>plugins/bootstrap-fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>plugins/bootstrap-fileinput/js/fileinput.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>plugins/select2/select2.min.js"></script>
    <script src="<?=$this->Url->build('/', true);?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>




    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?=$this->Url->build('/plugins/bstable/bootstrap-table.min.css', true);?>">

    <!-- Latest compiled and minified JavaScript -->
    <script src="<?=$this->Url->build('/plugins/bstable/bootstrap-table.min.js', true);?>"></script>
    <script src="<?=$this->Url->build('/plugins/bstable/extensions/export/bootstrap-table-export.min.js', true);?>"></script>


    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>


</head>

<body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper nav-collapsed menu-collapsed">


        <!-- main menu-->
        <?=$this->element('app_sidebar', ["page" => $page])?>
        <!-- / main menu-->


        <!-- Navbar (Header) Starts-->
        <?=$this->element('navbar_header')?>
        <!-- Navbar (Header) Ends-->

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <?=$this->Flash->render()?>
                    <?=$this->fetch('content')?>
                </div>
            </div>

            <footer class="footer footer-static footer-light">
                <p class="clearfix text-muted text-sm-center px-2">
                    <span>Copyright &copy;
                        <?=date("Y")?>
                        <a href="<?=$this->Url->build('/', true);?>" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">Imge.to Admin</a>, All rights reserved. </span>
                </p>
            </footer>

        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- START Notification Sidebar-->
    <?=$this->element('notification_sidebar')?>
    <!-- END Notification Sidebar-->
    <!-- Theme customizer Starts-->
    <?php //echo $this->element('theme_customiser')?>
    <!-- Theme customizer Ends-->
    <!-- BEGIN VENDOR JS-->

    <!-- BEGIN VENDOR JS-->


    <!-- BEGIN APEX JS-->



    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/datatable/dataTables.buttons.min.js"
        type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/datatable/buttons.flash.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/datatable/jszip.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/datatable/pdfmake.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/datatable/vfs_fonts.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/datatable/buttons.html5.min.js" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/', true);?>app-assets/vendors/js/datatable/buttons.print.min.js" type="text/javascript"></script>

    <script src="<?=$this->Url->build('/plugins/jquery-lazy/jquery.lazy.min.js', true);?>" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/plugins/blockui/jquery.blockUI.js', true);?>" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/plugins/toastr/toastr.min.js', true);?>" type="text/javascript"></script>
    <script src="<?=$this->Url->build('/plugins/sweetalert2/sweetalert2.min.js', true);?>" type="text/javascript"></script>

    <link rel="stylesheet" href="<?=$this->Url->build('/plugins/jquery-confirm/dist/jquery-confirm.min.css', true);?>">
    <script src="<?=$this->Url->build('/plugins/jquery-confirm/dist/jquery-confirm.min.js', true);?>"></script>




    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- <script src="<?=$this->Url->build('/', true);?>app-assets/js/dashboard1.js" type="text/javascript"></script> -->
    <!-- END PAGE LEVEL JS-->

    <?=$this->element('custom_scripts')?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
 

</body>

</html>
