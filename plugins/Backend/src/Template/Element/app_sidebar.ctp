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
                <li class="nav-item <?=$page == 'posts' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'posts', 'action' => 'index']);?>">
                        <i class="ft-bookmark"></i>
                        <span data-i18n="" class="menu-title">Posts</span>
                        <span class="tag badge badge-pill badge-dark float-right mr-1 mt-1">
                        <?=$viewCounts['posts']?>
                        </span>
                    </a>
                </li>
                <li class="nav-item <?=$page == 'subreddits' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'Subreddits', 'action' => 'index']);?>">
                        <i class="ft-aperture" aria-hidden="true"></i>
                        <span data-i18n="" class="menu-title">Subreddits</span>
                        <span class="tag badge badge-pill badge-dark float-right mr-1 mt-1">
                        <?=$viewCounts['subreddits']?>
                        </span>
                    </a>
                </li>                
                <li class="nav-item <?=$page == 'accounts' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'Accounts', 'action' => 'index']);?>">
                        <i class="ft-user"></i>
                        <span data-i18n="" class="menu-title">Accounts</span>
                        <span class="tag badge badge-pill badge-dark float-right mr-1 mt-1">
                        <?=$viewCounts['accounts']?>
                        </span>
                    </a>
                </li>
                <!-- <li class="nav-item <?=$page == 'settings' ? 'active' : ''?>">
                    <a
                        href="<?=$this->Url->build(['prefix' => false, 'controller' => 'GeneralSettings', 'action' => 'index']);?>">
                        <i class="ft-settings"></i>
                        <span data-i18n="" class="menu-title">Settings</span>

                    </a>
                </li> -->


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
