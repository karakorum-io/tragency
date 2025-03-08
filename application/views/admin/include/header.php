<div class="main-header">
    <div class="logo text-center">
        <a href="<?= base_url('admin/users/dashboard') ?>">
            <img style="width:auto;height:50px" src="<?= base_url() ?>assets/images/saGA1.png" alt="">
        </a>
    </div>
    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div style="margin: auto"></div>
    <div class="header-part-right">
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
        <div class="dropdown">
            <div class="user col align-self-end">
                <img style="box-shadow: 1px 1px 5px #ededed;"
                    src="<?= base_url() ?>assets/admin/images/0c3b3adb1a7530892e55ef36d3be6cb8.png" id="userDropdown"
                    alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <?php
                    if (isset($this->session->userdata('userInfo')->id)) {
                        ?>
                        <a class="dropdown-item"
                            href="<?= base_url('admin/users/profile/' . $this->session->userdata('userInfo')->id) ?>">
                            <i class="i-Lock-User mr-1"></i> My Profile
                        </a>
                        <a class="dropdown-item" href="<?= base_url('admin/packages') ?>">
                            <i class="i-Lock-User mr-1"></i> Packages
                        </a>
                        <a class="dropdown-item" href="<?= base_url('admin/addons') ?>">
                            <i class="i-Lock-User mr-1"></i> Addons
                        </a>
                        <a class="dropdown-item" href="<?= base_url('admin/queries') ?>">
                            <i class="i-Lock-User mr-1"></i> Queries
                        </a>
                        <a class="dropdown-item" href="<?= base_url('admin/blogs') ?>">
                            <i class="i-Lock-User mr-1"></i> Blogs
                        </a>
                        <a class="dropdown-item" href="<?= base_url('admin/experiences') ?>">
                            <i class="i-Lock-User mr-1"></i> Experiences
                        </a>
                        <a class="dropdown-item" href="<?= base_url('admin/customers') ?>">
                            <i class="i-Lock-User mr-1"></i> Customers
                        </a>
                        <a class="dropdown-item" href="<?= base_url('admin/users') ?>">
                            <i class="i-Lock-User mr-1"></i> Users
                        </a>
                        <a class="dropdown-item" href="<?= base_url('admin/email_templates') ?>">
                            <i class="i-Lock-User mr-1"></i> Email Templates
                        </a>
                        <a class="dropdown-item" href="<?= base_url('admin/configurations') ?>">
                            <i class="i-Lock-User mr-1"></i> Configurations
                        </a>
                        <a class="dropdown-item" href="<?= base_url('admin/users/logout') ?>">
                            <i class="i-Lock-User mr-1"></i> Logout
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>