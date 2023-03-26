<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/include/head');?>
      <style>
    .btn_remove_area{
         position: absolute;
    top: 16px;
    right: 10px;
    padding: 0 3px;
    font-size: 9px;}
    </style>
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">
        <?php $this->load->view('admin/include/header');?>
        <?php $this->load->view('admin/include/sidebar');?>
        
        <!-- =============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
              
               
                    <!-- ICON BG-->
                 
        <form action = "<?=base_url('master/edit_settings_action')?>" method = "post" enctype='multipart/form-data'>
                       <?php echo form_open('form'); ?> 
            
              
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <!-- ICON BG--> 
                      <?php if($data->num_rows() > 0){
                              
                                $row = $data->result()[0];
                                
                            ?>
                    <div class="offset-lg-4 col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                        <div class="card mb-3">
                             <div class="card-header text-center">
                                 <h1 class=" h5 mr-2"><b>Edit Settings</b></h1>
                             </div> 
                            <div class="card-body"> 
                                     
        
       
                                 <div class="row">
            
                             <div class="form-group col-sm-12">
                                <label for="email">Currency Symbol</label>
                                <input name="currency_symbol" class="form-control " id="email" type="text" value="<?=$row->currency_symbol?>" required>
                             </div>
                               <div class="form-group col-sm-12">
                                <label for="email">Currency Alphabetic</label>
                                <input name="currency_alpha" class="form-control " id="email" type="text" value="<?=$row->currency_alpha?>" required>
                             </div>
                               <div class="form-group col-sm-12">
                                <label for="email">Support Mail</label>
                                <input name="support_mail" class="form-control " id="email" type="text" value="<?=$row->support_mail?>" required>
                             </div>
                           
                             
                                  
                            <div class="form-group col-sm-12">
                                 <input name="id" class="form-control " id="email" type="hidden"  value="<?=$row->id?>">
                                 <button type="submit" class="btn btn-primary btn-lg">Update</button> 
                            </div>
                            
                                  </div>
                                  </div>
                                  </div>
                                 
                                  </div> </div> 
                                   
                        </div>
                    </div>
                    
               </div>
               
                  </form>
                  <?php }?>
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
         
            <!-- fotter end -->
        </div>
    </div><!-- ============ Search UI Start ============= -->
    
    <!-- ============ Search UI End ============= -->
    <?php $this->load->view('admin/include/footerscript');?>
   
</body>


</html>