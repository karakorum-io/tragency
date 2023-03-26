
    
    <footer class="footer-area bg-blue-dark font-heading-book" >
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget widget">
                    <div class="about_us_widget">
                        <a href="index.html" class="footer-logo">
                            <img src="<?=base_url()?>assets/img/remotel-removebg-preview.png" alt="footer logo">
                        </a>
                        <p class="tw-text-white">We believe in providing best in class travel and tourism experience to our customers at affordable price.</p>
                        <ul class="social-icon">
                            <li>
                                <a class="facebook" href="http://facebook.com/" target="_blank"><i class="fa fa-facebook  "></i></a>
                            </li>
                            <li>
                                <a class="twitter" href="http://twitter.com/" target="_blank"><i class="fa fa-twitter  "></i></a>
                            </li>
                            <li>
                                <a class="pinterest" href="http://instagram.com" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a class="pinterest" href="http://youtube.com/" target="_blank"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget widget ">
                    <div class="widget-contact">
                        <h4 class="widget-title">Contact us</h4>
                        <p>
                            <i class="fa fa-map-marker"></i>
                            <span>Sanjay Place Road, Agra</span>
                        </p>
                        <p class="location">
                            <i class="fa fa-envelope-o"></i>
                            <span>info@mtajtour.com , mtajtour@gmail.com</span>
                        </p>
                        <p class="telephone">
                            <i class="fa fa-phone base-color"></i>
                            <span>
                                +91 85257 75854 , +91 96358 81145
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget widget">
                    <h4 class="widget-title">Quick Link</h4>
                    <ul class="widget_nav_menu">
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li><a href="#0">About Us</a></li>
                        <li><a href="<?=base_url()?>client-testimonials">Testimonials</a></li>
                        <li><a href="<?=base_url()?>blogs">Blog</a></li>
                        <li><a href="<?=base_url()?>contact">Contact</a></li>
                      
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget widget mb-4">
                <h4 class="widget-title">User Account</h4>
                    <ul class="widget_nav_menu">
                        <li><a href="<?=base_url()?>welcome/user_login">Login/Register</a></li>
                        <li><a href="<?=base_url()?>welcome/bookings">My Bookings</a></li>
                      <li><a href="#">Terms and Conditions</a></li>
                       <li><a href="#">Refund & Cancellation Policy</a></li>
                    </ul>
                </div>
                  
            </div>
            <div class="col-lg-12">
                <div class="footer-widget widget mb-4">
                <h4 class="widget-title">Our Destinations</h4>
                   <ul class="list-inline tw-pl-0">
                      <?php if($destination->num_rows()>=1){
                                    foreach($destination->result() as $rowl){
                                        echo'<li class="list-inline-item mr-3"><a href="'.base_url().'destination/'.$rowl->slug.'">'.$rowl->name.'</a></li>';
                                    }
                                }?>
                       
                      </ul>
                </div>
                  
            </div>
            
        </div>
    </div>
    <div class="copyright-inner">
        <div class="copyright-text">
       © 2023 REMOTE LANDS, INC. ALL RIGHTS RESERVED
        </div>
    </div>
</footer>

  
    
    
<!-- footer area end -->
<!-- back to top area start -->
<div class="back-to-top">
    <span class="back-top"><i class="fa fa-angle-up"></i></span>
</div>
<!-- back to top area end -->
<!-- Additional plugin js -->
<script src="<?=base_url()?>/assets/js/jquery-2.2.4.min.js"></script>
<script src="<?=base_url()?>/assets/js/popper.min.js"></script>
<script src="<?=base_url()?>/assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>/assets/js/jquery.magnific-popup.js"></script>
<script src="<?=base_url()?>/assets/js/owl.carousel.min.js"></script>
<script src="<?=base_url()?>/assets/js/wow.min.js"></script>
<script src="<?=base_url()?>/assets/js/slick.js"></script>
<script src="<?=base_url()?>/assets/js/waypoints.min.js"></script>
<script src="<?=base_url()?>/assets/js/jquery.counterup.min.js"></script>
<script src="<?=base_url()?>/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?=base_url()?>/assets/js/isotope.pkgd.min.js"></script>
<script src="<?=base_url()?>/assets/js/swiper.min.js"></script>
<script src="<?=base_url()?>/assets/js/jquery.nice-select.min.js"></script>
<script src="<?=base_url()?>/assets/js/jquery-ui.min.js"></script>
<script src="<?=base_url()?>/assets/js/simple-lightbox.js?v2.2.1"></script>
<!-- main js -->
<script src="<?=base_url()?>/assets/js/main.js?v=1.28"></script>

<script src="<?=base_url()?>/assets/admin/js/plugins/sweetalert2.min.js"></script>

  
  <?php if($this->session->flashdata('error_message')!=''){ ?>
            <script>
$( document ).ready(function() {
    swal('Error', '<?=$this->session->flashdata('error_message');?>', 'warning', 3000, false);
 
}); 
</script>
                                     
                        <?php }?>
                        
                         <?php if($this->session->flashdata('success_message')!=''){ ?>
            <script>
$( document ).ready(function() {
    swal('Success', '<?=$this->session->flashdata('success_message');?>', 'success', 3000, false);
 
}); 
</script>
                                     
                        <?php }?>
 