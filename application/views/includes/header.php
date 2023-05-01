<div class="body-overlay" id="body-overlay"></div>
<style>
    .navbar-area .nav-container .desktop-logo img {
        padding: 14px 0 !important;
    }
</style>
<!-- navbar area start -->
<nav class="navbar navbar-area navbar-expand-lg nav-style-01">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="mobile-logo">
                <a href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>assets/images/saGA1.png" alt="logo">
                </a>
            </div>
            <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#tp_main_menu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggle-icon">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </span>
            </button>
            <div class="nav-right-content">
                <ul class="pl-0">
                    <?php
                    if (!$this->session->userdata('user_data')) {
                        ?>
                        <li class="notification">
                            <a class="" href="<?= base_url() ?>web/user_login">Sign In / Sign Up</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="tp_main_menu">
            <div class="logo-wrapper desktop-logo">
                <a href="<?= base_url() ?>" class="main-logo">
                    <img src="<?= base_url() ?>assets/images/saGA1.png" alt="logo">
                </a>
                <a href="<?= base_url() ?>" class="sticky-logo">
                    <img src="<?= base_url() ?>assets/images/saGA1.png" alt="logo">
                </a>
            </div>
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="">
                    <a href="<?= base_url() ?>about">About</a>
                </li>
                <li class="menu-item-has-children destinations-menu">
                    <a href="#">Destinations</a>
                    <ul class="sub-menu">
                        <?php
                        $destination = getAllDestination($this->db);
                        if (count($destination) >= 1) {
                            foreach ($destination as $rowl) {
                                echo '<li><a href="' . base_url() . 'destination/' . $rowl->slug . '">' . $rowl->name . '</a></li>';
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Why Us?</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="<?= base_url() ?>why-expedition-saga">Why Us?</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>client-testimonials">Client Testimonials</a>
                        </li>
                    </ul>
                </li>
                </li>
                <li>
                    <a href="<?= base_url() ?>blogs">Blogs</a>
                </li>
                <li>
                    <a href="<?= base_url() ?>contact">Contact</a>
                </li>
                <?php
                if ($this->session->userdata('user_data')) {
                    ?>
                    <li class="notification">
                        <a class="" href="<?= base_url() ?>web/bookings">
                            My Bookings
                        </a>
                    </li>
                    <li class="">
                        <a class="" title="Logout" href="<?= base_url() ?>web/user_logout">
                            Sign Out
                        </a>
                    </li>
                    <?php
                } ?>
            </ul>
        </div>
        <div class="nav-right-content">
            <ul>
                <?php
                if (!$this->session->userdata('user_data')) {
                    ?>
                    <li class="notification">
                        <a href="<?= base_url() ?>web/user_login">
                            <span> Sign In / Sign Up</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>