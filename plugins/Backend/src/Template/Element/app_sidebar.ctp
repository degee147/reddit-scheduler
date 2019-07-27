<!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
<div data-active-color="black" data-background-color="white" data-image="" class="app-sidebar">
    <!-- main menu header-->
    <!-- Sidebar Header starts-->
    <div class="sidebar-header">
        <div class="logo clearfix">
            <a href="<?=$this->Url->build('/', true);?>" class="logo-text float-left">
                <div class="logo-img">
                    <img src="<?=$this->Url->build('/', true);?>app-assets/img/logo-dark.png">
                </div>
                <!-- <span class="text align-middle">BKMK</span> -->
            </a>
            <a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block">
                <i data-toggle="expanded" class="ft-toggle-right toggle-icon"></i>
            </a>
            <a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none">
                <i class="ft-x"></i>
            </a>
        </div>
    </div>
    <!-- Sidebar Header Ends-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li class="nav-item <?=$page == 'dashboard' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'dashboard', 'action' => 'index']);?>">
                        <i class="ft-home"></i>
                        <span data-i18n="" class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item <?=$page == 'images' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'Images', 'action' => 'index']);?>">
                        <i class="ft-image"></i>
                        <span data-i18n="" class="menu-title">Images</span>
                        <span class="tag badge badge-pill badge-dark float-right mr-1 mt-1">
                        <?=$viewCounts['images']?>
                        </span>
                    </a>
                </li>                
                <li class="nav-item <?=$page == 'trash' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'Images', 'action' => 'trash']);?>">
                        <i class="ft-trash"></i>
                        <span data-i18n="" class="menu-title">Trash</span>
                        <span class="tag badge badge-pill badge-dark float-right mr-1 mt-1">
                        <?=$viewCounts['trash']?>
                        </span>
                    </a>
                </li>                
                <li class="nav-item <?=$page == 'users' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'Users', 'action' => 'index']);?>">
                        <i class="ft-users"></i>
                        <span data-i18n="" class="menu-title">Users</span>
                        <span class="tag badge badge-pill badge-dark float-right mr-1 mt-1">
                            <?=$viewCounts['users']?>
                        </span>
                    </a>
                </li>
                <li class="nav-item <?=$page == 'user_banned' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'users', 'action' => 'banned']);?>">
                        <i class="ft-user"></i>
                        <span data-i18n="" class="menu-title">Banned Users</span>
                        <span class="tag badge badge-pill badge-dark float-right mr-1 mt-1">
                        <?=$viewCounts['banned_users']?>
                        </span>
                    </a>
                </li>
                <li class="nav-item <?=$page == 'banned_ips' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'users', 'action' => 'bannedIps']);?>">
                        <i class="ft-navigation-2"></i>
                        <span data-i18n="" class="menu-title">Banned IPs</span>
                        <span class="tag badge badge-pill badge-dark float-right mr-1 mt-1">
                        <?=$viewCounts['banned_ips']?>
                        </span>
                    </a>
                </li>
                <li class="nav-item <?=$page == 'settings' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'GeneralSettings', 'action' => 'index']);?>">
                        <i class="ft-settings"></i>
                        <span data-i18n="" class="menu-title">Settings</span>

                    </a>
                </li>


            </ul>
        </div>
    </div>
    <!-- main menu content-->
    <div class="sidebar-background"></div>
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
</div>
<script src="<?=$this->Url->build('/', true);?>app-assets/js/app-sidebar.js" type="text/javascript"></script>
