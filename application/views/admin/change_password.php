<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/include/head');?>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header');?>
        <?php $this->load->view('admin/include/sidebar');?>
        
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="row">
                    <!-- ICON BG-->
                   
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    <h1 class="mr-2">Change Password</h1>
                   
                </div><div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="float-right">
                    </div>
               </div></div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <!-- ICON BG-->
                   
                    <div class="offset-lg-2 col-lg-8">
                        <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                            <div class="card-body"> 
                                     <form action = "<?=base_url('admin_manage/change_password_action')?>" method = "post" enctype='multipart/form-data'  class="authentication-form w-100">
        
         <?php echo form_open('form'); ?> 
                            <div class="form-group">
                                <label for="email">Old Password</label>
                       
                                <input name="op" class="form-control " id="email" type="text" required="">
                            </div>
                             <div class="form-group">
                                <label for="email">New Password</label>
                       
                                <input name="np" class="form-control " id="email" type="text" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Confirm Password</label>
                       
                                <input name="cp" class="form-control " id="email" type="text" required="">
                            </div> 
                            
                            
                            <button type="submit" class="btn btn-primary btn-block mt-2">Submit</button>
                       </form>
                       
                            </div>
                        </div>
                    </div>
                    
               </div>
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
         
            <!-- fotter end -->
        </div>
    </div><!-- ============ Search UI Start ============= -->
    
    <!-- ============ Search UI End ============= -->
    <?php $this->load->view('admin/include/footerscript');?>
         
</body>


</html>