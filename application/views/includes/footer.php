<style>
    .about_us_widget .footer-logo img {
        max-width: 189px;
    }
</style>
<footer class="footer-area bg-blue-dark font-heading-book">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget widget">
                    <div class="about_us_widget">
                        <a href="index.html" class="footer-logo">
                            <img src="<?= base_url() ?>assets/images/saGA1.png" style="max-height: 83px;"
                                alt="footer logo">
                        </a>
                        <?php
                        $aboutShort = getcontentByNeedle($this->db, 'company-xs-description');
                        if ($aboutShort) {
                            foreach ($aboutShort as $content) {
                                ?>
                                <p class="tw-text-white">
                                    <?php echo $content['short_description'] ?>
                                </p>
                                <?php
                            }
                        }
                        ?>
                        <ul class="social-icon">
                            <li>
                                <?php
                                $fbPage = getcontentByNeedle($this->db, 'facebook-page');
                                if ($fbPage) {
                                    foreach ($fbPage as $content) {
                                        ?>
                                        <a class="facebook" href="<?php echo $content['sub_title'] ?>" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                            </li>
                            <li>
                                <?php
                                $twitter = getcontentByNeedle($this->db, 'twitter-page');
                                if ($twitter) {
                                    foreach ($twitter as $content) {
                                        ?>
                                        <a class="twitter" href="<?php echo $content['sub_title'] ?>" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                            </li>
                            <li>
                                <?php
                                $insta = getcontentByNeedle($this->db, 'instagram-page');
                                if ($insta) {
                                    foreach ($insta as $content) {
                                        ?>
                                        <a class="pinterest" href="<?php echo $content['sub_title'] ?>" target="_blank">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                            </li>
                            <li>
                                <?php
                                $youtube = getcontentByNeedle($this->db, 'youtube-channel');
                                if ($youtube) {
                                    foreach ($youtube as $content) {
                                        ?>
                                        <a class="pinterest" href="<?php echo $content['sub_title'] ?>" target="_blank">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                        <?php
                                    }
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget widget ">
                    <div class="widget-contact" itemscope itemtype="http://schema.org/Organization">
                        <h4 class="widget-title">Contact us</h4>
                        <p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                            <i class="fa fa-map-marker"></i>
                            <span itemprop="streetAddress">
                                <?php
                                $contactUsAddress = getcontentByNeedle($this->db, 'contact-address-1');
                                if ($contactUsAddress) {
                                    foreach ($contactUsAddress as $content) {
                                        ?>
                                        <?php echo $content['short_description'] ?>
                                        <?php
                                    }
                                }
                                ?>
                                <br />
                                <?php
                                $contactUsAddress2 = getcontentByNeedle($this->db, 'contact-address-2');
                                if ($contactUsAddress2) {
                                    foreach ($contactUsAddress2 as $content) {
                                        ?>
                                        <?php echo $content['short_description'] ?>
                                        <?php
                                    }
                                }
                                ?>
                            </span>
                        </p>
                        <p class="location" itemprop="email">
                            <i class="fa fa-envelope-o"></i>
                            <?php
                            $contactEmail = getcontentByNeedle($this->db, 'contact-email');
                            if ($contactEmail) {
                                foreach ($contactEmail as $content) {
                                    ?>
                                    <span>
                                        <?php echo $content['sub_title'] ?>
                                    </span>
                                    <?php
                                }
                            }
                            ?>
                        </p>
                        <p class="telephone" itemprop="telephone">
                            <i class="fa fa-phone base-color"></i>
                            <?php
                            $contactPhone = getcontentByNeedle($this->db, 'contact-phone');
                            if ($contactPhone) {
                                foreach ($contactPhone as $content) {
                                    ?>
                                    <span>
                                        <?php echo $content['sub_title'] ?>
                                    </span>
                                    <?php
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget widget">
                    <h4 class="widget-title">Quick Link</h4>
                    <ul class="widget_nav_menu">
                        <li><a href="<?= base_url() ?>">Home</a></li>
                        <li><a href="<?= base_url() ?>about">About Us</a></li>
                        <li><a href="<?= base_url() ?>why-expedition-saga">Why Us?</a></li>
                        <li><a href="<?= base_url() ?>client-testimonials">Testimonials</a></li>
                        <li><a href="<?= base_url() ?>blogs">Blogs</a></li>
                        <li><a href="<?= base_url() ?>contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget widget mb-4">
                    <h4 class="widget-title">User Account</h4>
                    <ul class="widget_nav_menu">
                        <li><a href="<?= base_url() ?>web/user_login">Login / Sign Up</a></li>
                        <li><a href="<?= base_url() ?>web/bookings">My Bookings</a></li>
                        <li><a href="<?= base_url() ?>terms-conditions">Terms of Usage</a></li>
                        <li><a href="<?= base_url() ?>cancellation-policy">Cancellation Policy</a></li>
                        <li><a href="<?= base_url() ?>b2b">B2B - Request</a></li>
                        <li><a target="_blank" href="https://gamma.app/public/B2B-Proposal-290a68prj97odqr">B2B Brochure</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="footer-widget widget mb-4">
                    <h4 class="widget-title">Destinations</h4>
                    <ul class="list-inline tw-pl-0 text-center">
                        <?php
                        $destination = getAllDestination($this->db);
                        if (count($destination) >= 1) {
                            foreach ($destination as $rowl) {
                                echo '<li class="list-inline-item mr-3"><a href="' . base_url() . 'destination/' . $rowl->slug . '">' . $rowl->name . '</a></li>';
                            }
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="copyright-inner">
        <div class="copyright-text">
         <?php
            $footerText = getcontentByNeedle($this->db, 'footer-text');
            if ($footerText) {
                foreach ($footerText as $content) {
                    ?>
                    <?php echo $content['sub_title'] ?>
                    <?php
                }
            }
            ?>

           
            <br/>
            <strong>GST : 09AAKFE7359L1ZP <br/></strong>
            <!-- <a target="_blank" href="<?php echo base_url();?>uploads/certificates/msme-certificate.pdf">Download Here</a> -->
        </div>
    </div>
</footer>
<!-- footer area end -->
<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>

<a href="<?= base_url() ?>personalized-tours">
    <div class="btn btn-outline-gold get-quotes" role="dialog">
        CUSTOM ITINERARY
    </div>
</a>
<!-- back to top area end -->
<!-- Additional plugin js -->
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.magnific-popup.js"></script>
<script src="<?= base_url() ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/assets/js/wow.min.js"></script>
<script src="<?= base_url() ?>/assets/js/slick.js"></script>
<script src="<?= base_url() ?>/assets/js/waypoints.min.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.counterup.min.js"></script>
<script src="<?= base_url() ?>/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?= base_url() ?>/assets/js/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>/assets/js/swiper.min.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url() ?>/assets/js/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>/assets/js/simple-lightbox.js?v2.2.1"></script>
<!-- main js -->
<script src="<?= base_url() ?>/assets/js/main.js?v=12.28"></script>
<script src="<?= base_url() ?>/assets/admin/js/plugins/sweetalert2.min.js"></script>
<?php if ($this->session->flashdata('error_message') != '') { ?>
    <script>
        $(document).ready(function () {
            swal('Error', '<?= $this->session->flashdata('error_message'); ?>', 'warning', 3000, false);
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('success_message') != '') { ?>
    <script>
        $(document).ready(function () {
            swal('Success', '<?= $this->session->flashdata('success_message'); ?>', 'success', 3000, false);
        });
    </script>
<?php } ?>