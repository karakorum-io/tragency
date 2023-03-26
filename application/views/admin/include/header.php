<div class="main-header">
            <div class="logo">
                <a href="<?=base_url('master')?>"><img style="   
    width:auto;height:50px" src="<?=base_url()?>assets/img/travel_logo.png" alt=""></a>
            </div>
            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
           
            <div style="margin: auto"></div>
            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
                <!-- Grid menu Dropdown -->
             
                <!-- Notificaiton -->
              
                <!-- Notificaiton End -->
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user col align-self-end">
                        <img style="box-shadow: 1px 1px 5px #ededed;" src="<?=base_url()?>assets/admin/images/0c3b3adb1a7530892e55ef36d3be6cb8.png" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> Admin Panel
                            </div>
                            <a class="dropdown-item" href="<?= base_url('master/settings') ?>"><i class="i-Data-Settings mr-1"></i> Settings</a>
                            <a class="dropdown-item" href="<?= base_url('welcome/logout_admin') ?>"><i class="i-Lock-User mr-1"></i> Sign Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>