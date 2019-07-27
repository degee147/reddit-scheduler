<?php $this->assign('title', 'View User');?>
<style>
    #user-profile .profile-with-cover .profile-cover-buttons {
        /* position: absolute; */
        top: unset;
        right: 10px;
    }

</style>
<section id="user-profile">
    <div class="row">
        <div class="col-12">
            <div class="card profile-with-cover">
                <div class="card-img-top img-fluid bg-cover height-100" style="background: grey"></div>
                <div class="media profil-cover-details row">
                    <div class="col-5">
                        <div class="align-self-start halfway-fab pl-3 pt-2">
                            <div class="text-left">
                                <h3 class="card-title white">
                                    <?=$user->name_desc?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="align-self-center halfway-fab text-center">
                            <a class="profile-image">
                                <img src="<?=$this->Url->build('/', true);?>app-assets/img/portrait/avatars/avatar-08.png"
                                    class="rounded-circle img-border gradient-summer width-100" alt="Card image">
                            </a>
                        </div>
                    </div>
                    <div class="col-5">
                    </div>
                    <div class="profile-cover-buttons">
                        <div class="media-body halfway-fab align-self-end">
                            <div class="text-right d-none d-sm-none d-md-none d-lg-block">
                                <?=$this->Html->link(__('<i class="fa fa-edit"></i>Edit User'), ['action' => 'edit', $user->id], ['class' => 'btn btn-xs btn-raised btn-warning btn-icon mr-1 btn-sm', 'escape' => false])?>
                                <!-- <a href="<?=$this->Url->build(['action' => 'edit', $user->id]);?>" class="btn btn-info btn-raised mr-2"><i class="fa fa-edit"></i> Edit User</a> -->
                                <!-- <button type="button" class="btn btn-success btn-raised mr-3"><i class="fa fa-dashcube"></i> Message</button> -->
                            </div>
                            <!-- <div class="text-right d-block d-sm-block d-md-block d-lg-none">
                                <button type="button" class="btn btn-primary btn-raised mr-2"><i class="fa fa-plus"></i></button>
                                <button type="button" class="btn btn-success btn-raised mr-3"><i class="fa fa-dashcube"></i></button>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="profile-section">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 ">
                            <ul class="profile-menu no-list-style">
                                <li>
                                    <a href="#about" class="primary font-medium-2 font-weight-600">About</a>
                                </li>
                                <li>
                                    <a href="#orders" class="primary font-medium-2 font-weight-600">Orders</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-2 text-center">
                            <span class="font-medium-2 text-uppercase">
                                <?=$user->firstname?>
                            </span>
                            <!-- <p class="grey font-small-2">Ninja Developer</p> -->
                        </div>
                        <div class="col-lg-5 col-md-5">
                            <ul class="profile-menu no-list-style">
                                <li>
                                    <a href="#addresses" class="primary font-medium-2 font-weight-600">Addresses</a>
                                </li>
                                <li>
                                    <a href="#wishlist" class="primary font-medium-2 font-weight-600">Wishlist</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Basic User Details Ends-->

<!--About section starts-->
<section id="about">
    <div class="row">
        <div class="col-12">
            <div class="content-header">About</div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h5>Personal Information</h5> -->
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <!-- <div class="mb-3">
                            <span class="text-bold-500 primary">About Me:</span>
                            <span class="display-block overflow-hidden">
                            </span>
                        </div> -->
                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <ul class="no-list-style">
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary">
                                            <a>
                                                <i class="icon-present font-small-3"></i> Birthday:</a>
                                        </span>
                                        <span class="display-block overflow-hidden">
                                            <?=$this->Custom->niceDateNoYear($user->dob)?>
                                        </span>
                                    </li>

                                    <li class="mb-2">
                                        <span class="text-bold-500 primary">
                                            <a>
                                                <i class="ft-map-pin font-small-3"></i> LGA:</a>
                                        </span>
                                        <span class="display-block overflow-hidden">
                                            <?=ucfirst(!empty($user->lga) ? $user->lga->name : 'Not Available')?>
                                        </span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary">
                                            <a>
                                                <i class="ft-globe font-small-3"></i> State:</a>
                                        </span>
                                        <span class="display-block overflow-hidden">
                                            <?=ucfirst(!empty($user->lga->state) ? $user->lga->state->name : 'Not Available')?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <ul class="no-list-style">
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary">
                                            <a>
                                                <i class="ft-user font-small-3"></i> Gender:</a>
                                        </span>
                                        <span class="display-block overflow-hidden">
                                            <?=ucfirst($user->gender)?>
                                        </span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary">
                                            <a>
                                                <i class="ft-mail font-small-3"></i> Email:</a>
                                        </span>
                                        <a class="display-block overflow-hidden">
                                            <?=ucfirst($user->email)?>
                                        </a>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary">
                                            <a>
                                                <i class="ft-monitor font-small-3"></i> Website:</a>
                                        </span>
                                        <a class="display-block overflow-hidden">
                                            <?=ucfirst($user->website)?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <ul class="no-list-style">
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary">
                                            <a>
                                                <i class="ft-smartphone font-small-3"></i> Phone Number:</a>
                                        </span>
                                        <span class="display-block overflow-hidden">
                                            <?=ucfirst($user->phone)?>
                                        </span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary">
                                            <a>
                                                <i class="ft-briefcase font-small-3"></i> Username:</a>
                                        </span>
                                        <span class="display-block overflow-hidden">
                                            <?=$user->username?>
                                        </span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary">
                                            <a>
                                                <i class="ft-book font-small-3"></i> Joined:</a>
                                        </span>
                                        <span class="display-block overflow-hidden">
                                            <?=$this->Time->timeAgoInWords($user->created)?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About section ends-->

<!--User Timeline section starts-->
<section id="orders">
    <!-- <div class="row">
        <div class="col-12">
            <div class="content-header">Orders</div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h5>Personal Information</h5> -->
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title"> Orders</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="<?=$this->Url->build(['controller' => 'Customers', 'action' => 'order', $user->id]);?>"
                                class="btn round btn-raised btn-dark">
                                <i class="fa fa-plus"></i>&nbsp; New Order for User
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <!-- <div class="mb-3">
                            <span class="text-bold-500 primary">About Me:</span>
                            <span class="display-block overflow-hidden">
                            </span>
                        </div> -->
                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-12 col-md-12 ">
                                <div class="table-responsive">
                                    <?=$this->element('order_table', ['orders' => $user->orders, 'ajax' => true, 'show_edit' => false, 'show_remove' => false, "idtouse"=>"userorders"])?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</section>
<!--User Timeline section ends-->

<!--User's friend section starts-->
<section id="addresses">
    <div class="row">
        <div class="col-12">
            <div class="content-header">Addresses</div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h5>Personal Information</h5> -->
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <!-- <div class="mb-3">
                            <span class="text-bold-500 primary">About Me:</span>
                            <span class="display-block overflow-hidden">
                            </span>
                        </div> -->
                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-12 col-md-12 ">
                                <div class="table-responsive">
                                    <?=$this->element('address_table', ['user_addresses' => $user->addresses, 'ajax' => true, 'show_edit' => false, 'show_remove' => false])?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!--User's friend section starts-->

<!--User's uploaded photos section starts-->
<section id="wishlist">
    <div class="row">
        <div class="col-12">
            <div class="content-header">Wishlist</div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h5>Personal Information</h5> -->
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <!-- <div class="mb-3">
                            <span class="text-bold-500 primary">About Me:</span>
                            <span class="display-block overflow-hidden">
                            </span>
                        </div> -->
                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-12 col-md-12 ">
                                <div class="table-responsive">
                                    <?=$this->element('item_table', ['items' => $user->items, 'ajax' => true, 'show_edit' => false, 'show_remove' => false, "idtouse"=>"wishlisttable", "wishlist_table" => true])?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!--User's uploaded photos section starts-->
<!--User Profile Starts-->

<!--User's uploaded photos section starts-->
<section id="wishlist">
    <div class="row">
        <div class="col-7">
            <div class="content-header">
                <?=$user->firstname ."'s"?> Cart</div>
        </div>
        <div class="col-5">
            <div class="content-header">
                Current Total: <span id="customer_cart_total">
                    <?=$naira . number_format($customer_cart_total)?></span></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <!-- <h5>Personal Information</h5> -->
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <!-- <div class="mb-3">
                            <span class="text-bold-500 primary">About Me:</span>
                            <span class="display-block overflow-hidden">
                            </span>
                        </div> -->
                        <!-- <hr> -->
                        <div class="row">
                            <div class="col-12 col-md-12 ">
                                <div class="table-responsive">
                                    <?=$this->element('cart_table_ajax', ['cart' => $customer_cart, 'tableid'=>'customer_cart_table'])?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
<!--User's uploaded photos section starts-->
<!--User Profile Starts-->
