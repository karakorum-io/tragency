<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/include/head');?>
   <style>
       
.auth-logo img {
    width: auto;
}
   </style>
   <body>
<div class="auth-layout-wrap" style="background: url(<?=base_url()?>assets/admin/images/706912.webp) repeat fixed;
    background-size: cover;
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;">
    <div class="auth-content">
        <div class="card o-hidden" style="background-color: #fff;">
            <div class="row">
                
                <div class="col-md-8">
                    <div class="p-4">
                        
                      
                      
                        <h1 class="mb-3 text-18">Admin login</h1>
                         <p>Enter your email address and password to
                                            access admin panel.</p>
                                             <?php echo validation_errors(); ?>
                    <form action = "<?=base_url('welcome/admin_login')?>" method = "post" enctype='multipart/form-data'  class="authentication-form">
        
         <?php echo form_open('form'); ?> 
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input name="email" class="form-control " id="email" type="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="pass" class="form-control " id="password" type="password">
                            </div>
                            <button type="submit" class="btn btn-rounded btn-primary btn-block mt-2">Log In</button>
                       </form>
                       
                    </div>
                </div>
                <div class="col-md-4 text-center" >
                    
                    <div class="pr-3 auth-right">
                       
                          <div class="auth-logo text-center mb-4"><img  src="<?=base_url()?>assets/img/travel_logo.png" style="height: 91px;" alt=""></div>
                          </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('admin/include/footerscript');?>

</body>
</html>