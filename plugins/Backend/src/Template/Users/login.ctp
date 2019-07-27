<?php $this->layout = false; $siteDescription = 'Reddit Scheduler';?>
<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities."> -->
    <!-- <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app"> -->
    <!-- <meta name="author" content="PIXINVENT"> -->
    <title>
        Login :: <?=$siteDescription?>
    </title>
    <link rel="apple-touch-icon" sizes="60x60"
        href="<?=$this->Url->build('/app-assets/', true);?>img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="<?=$this->Url->build('/app-assets/', true);?>img/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="<?=$this->Url->build('/app-assets/', true);?>img/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="<?=$this->Url->build('/app-assets/', true);?>img/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon"
        href="<?=$this->Url->build('/app-assets/', true);?>img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png"
        href="<?=$this->Url->build('/app-assets/', true);?>img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link
        href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css"
        href="<?=$this->Url->build('/app-assets/', true);?>fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?=$this->Url->build('/app-assets/', true);?>fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css"
        href="<?=$this->Url->build('/app-assets/', true);?>fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?=$this->Url->build('/app-assets/', true);?>vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css"
        href="<?=$this->Url->build('/app-assets/', true);?>vendors/css/prism.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="<?=$this->Url->build('/app-assets/', true);?>css/app.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
</head>

<body data-col="1-column" class=" 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="">
        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <!--Login Page Starts-->
                    <section id="login">
                        <div class="container-fluid">
                            <div class="row ">

                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <div class="card gradient-indigo-purple text-center width-400">
                                        <div class="card-img overlap">
                                            <img alt="element 06" class="mb-1"
                                                src="<?=$this->Url->build('/app-assets/', true);?>img/portrait/avatars/avatar-08.png"
                                                width="190">
                                        </div>
                                        <div class="card-body">
                                            <div class="card-block">
                                                <?= $this->Flash->render() ?>
                                                <?= $this->Flash->render('auth') ?>
                                                <h2 class="white">Login</h2>
                                                <?= $this->Form->create(null, ['class' => 'login-form']) ?>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <!-- <input type="email" class="form-control" name="inputEmail"
                                                            id="inputEmail" placeholder="Email" required> -->
                                                        <?= $this->Form->control('username_or_email', ['label' => false, 'placeholder'=>'Email or Username', 'id'=>'inputEmail','class'=>'form-control placeholder-no-fix','autocomplete'=> 'off', 'required']) ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <!-- <input type="password" class="form-control" name="inputPass"
                                                            id="inputPass" placeholder="Password" required> -->
                                                        <?= $this->Form->control('password', ['label' => false, "placeholder"=>"Password", 'id'=>'inputPass', 'class'=>'form-control placeholder-no-fix','autocomplete'=> 'off','required']) ?>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div
                                                                    class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0 ml-3">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        checked id="rememberme">
                                                                    <label class="custom-control-label float-left white"
                                                                        for="rememberme">Remember Me</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <!-- <button type="button"
                                                                class="btn btn-pink btn-block btn-raised">Submit</button> -->
                                                        <?= $this->Form->button(__('Login <i class="m-icon-swapright m-icon-white"></i>'), ['class'=>'btn btn-success uppercase']) ?>

                                                    </div>
                                                </div>
                                                <?= $this->Form->end() ?>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <!-- <div class="float-left"><a (click)="onForgotPassword()"
                                                    class="white">Recover Password</a></div>
                                            <div class="float-right"><a (click)="onRegister()" class="white">New
                                                    User?</a></div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Login Page Ends-->
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?=$this->Url->build('/app-assets/', true);?>vendors/js/core/jquery-3.2.1.min.js"
        type="text/javascript"></script>
    <script src="<?=$this->Url->build('/app-assets/', true);?>vendors/js/core/popper.min.js"
        type="text/javascript"></script>
    <script src="<?=$this->Url->build('/app-assets/', true);?>vendors/js/core/bootstrap.min.js"
        type="text/javascript"></script>
    <script src="<?=$this->Url->build('/app-assets/', true);?>vendors/js/perfect-scrollbar.jquery.min.js"
        type="text/javascript"></script>
    <script src="<?=$this->Url->build('/app-assets/', true);?>vendors/js/prism.min.js" type="text/javascript">
    </script>
    <script src="<?=$this->Url->build('/app-assets/', true);?>vendors/js/jquery.matchHeight-min.js"
        type="text/javascript"></script>
    <script src="<?=$this->Url->build('/app-assets/', true);?>vendors/js/screenfull.min.js"
        type="text/javascript"></script>
    <script src="<?=$this->Url->build('/app-assets/', true);?>vendors/js/pace/pace.min.js"
        type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="<?=$this->Url->build('/app-assets/', true);?>js/app-sidebar.js" type="text/javascript">
    </script>
    <script src="<?=$this->Url->build('/app-assets/', true);?>js/notification-sidebar.js"
        type="text/javascript"></script>
    <script src="<?=$this->Url->build('/app-assets/', true);?>js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
</body>

</html>
