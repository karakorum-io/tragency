<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>
<body>
    <?php include 'includes/header.php' ?>
    
 
      <div class="breadcrumb-area jarallax" style="background-image:url(<?=base_url()?>assets/img/bg/1.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner ">
                        <h4 class="page-title">Contact Us</h4>
                        <ul class="page-list">
                            <li><a href="<?=base_url()?>">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                             
                    </div>
                </div>
            </div>
        </div>
    </div>
     

    <!-- contact area End -->
    <div class="contact-area pd-top-100 pd-bottom-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                  
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 offset-xl-1 col-lg-4">
                    <div class="contact-info bg-gray">
                        <p>
                            <i class="fa fa-map-marker"></i> 
                    Sanjay Place Road, Agra
                        </p>
                       
                        <p>
                            <i class="fa fa-envelope"></i> 
                          info@mtajtour.com (tour) | mtajtour@gmail.com
                        </p>
                        <p>
                            <i class="fa fa-phone"></i> 
                          +91 96358 81145 , +91 96358 81145
                        </p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                     <form class="tp-form-wrap" method="post" action="<?=base_url()?>welcome/contact" >
                        <div class="row">
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Name</span>
                                    <input type="text" name="name">
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Contact</span>
                                    <input type="text" name="phone">
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Email</span>
                                    <input type="text" name="email">
                                </label>
                            </div>
                            <div class="col-lg-12">
                                <label class="single-input-wrap style-two">
                                    <span class="single-input-title">Message</span>
                                    <textarea name="messg"></textarea>
                                </label>
                            </div>
                                       <?php
                	$num_a = rand(1,29); 
	    $num_b = rand(1,9); 
	    $captcha = $num_a+$num_b;
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha);
        ?>   
        <div class="form-group col-md-4">
                                            <label class="form-label mb-1 text-2">Solve</label>
<h3 style="    background: #ddd;    padding: 5px 10px;
    text-align: center;" id="captImg"><?=$num_a; ?> + <?=$num_b; ?> = </h3>
                                        </div>
                                         <div class="form-group col-md-8">
<label class="form-label mb-1 text-2">Enter Answer</label>
<input type="text" name="captcha" value="" class="form-control text-3 h-auto py-2" required=""/>
                                        </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-yellow" href="#">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     
     
</body>
</html>
 
    <?php include 'includes/footer.php' ?>
</body>
</html>